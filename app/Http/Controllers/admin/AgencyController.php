<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\agencies;
use App\Models\admin\order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AgencyController extends Controller
{
    public function index()
    {
        return view('admin.agencies');
    }
    public function data_retrive(Request $request)
    {
        if ($request->ajax()) {
            $allData = agencies::all();

            $filterType = $request->input('filterType');
        
            switch ($filterType) {
                case 'admin':
                    $allData = agencies::where('added_by', 'admin')->get();
                    break;
                case 'customer':
                    $allData = agencies::where('added_by', 'customer')->get();
                    break;
                case 'hold':
                    $allData = agencies::where('show', 'hold')->get();
                    break;
                case 'active':
                    $allData = agencies::where('show', 'active')->get();
                    break;
                default:
                    // If no filter type is specified or an invalid filter type is provided, retrieve all data
                    $allData = agencies::all();
                    break;
            }
        
            if ($allData instanceof Collection && $allData->isEmpty()) {
                // Handle the case where the filtered data is empty
                $data = '<div class="no-results d-block"><h5>No Items Found</h5></div>';
            } else {
                // Process the retrieved data
                $data = view('admin.rander.agency-item', ['allData' => $allData])->render();
            }
        
            return response()->json(['status' => true, 'data' => $data, 'message' => 'Data retrieved successfully']);
        }
    }
    public function submit(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'app_no' => 'required',
                'app_name' => 'required',
                'app_logo' => 'required|image|mimes:jpeg,png|max:2048',
            ], [
                'app_no.required' => 'The App No field is required.',
                'app_name.required' => 'The App Name field is required.',
                'app_logo.required' => 'Please upload logo.',
                'app_logo.image' => 'The logo must be an image.',
                'app_logo.mimes' => 'The logo must be a jpeg or png file.',
                'app_logo.max' => 'The logo may not be greater than 2MB in size.',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Fill all required fields', 'errors' => $validator->errors()]);
            }
    
            // Generate unique filenames with title and timestamp
            $title = $request->input('app_name');
            $timestamp = now()->timestamp;
            $screen_logo_filename = Str::slug($title) . '-' . $timestamp . '-app-logo.' . $request->file('app_logo')->getClientOriginalExtension();
           
            // Move files to upload directory
            $request->file('app_logo')->move(base_path('../upload-files/agency/'), $screen_logo_filename);
        
            // Save data with uploaded file paths
            $data = $request->all();
            $data['app_logo'] = 'upload-files/agency/' . $screen_logo_filename;
            $successInfo = agencies::create($data);
        
            return response()->json(['status' => true, 'message' => 'Data saved successfully']);
        }
    }


    public function update(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'app_no' => 'required',
                'app_name' => 'required',
               
            ], [
                'app_no.required' => 'The App No field is required.',
                'app_name.required' => 'The App Name field is required.',
                'app_logo.required' => 'Please upload logo.',
                'app_logo.image' => 'The logo must be an image.',
                'app_logo.mimes' => 'The logo must be a jpeg or png file.',
                'app_logo.max' => 'The logo may not be greater than 2MB in size.',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Validation error', 'errors' => $validator->errors()]);
            }
    
            $successInfo = agencies::find($request->input('id'));
    
            // Update title
            $successInfo->app_no = $request->input('app_no');
            $successInfo->app_name = $request->input('app_name');
            $successInfo->added_by = $request->input('added_by');
            $successInfo->show = $request->input('show');
    
            $uploadPath = storage_path('../upload-files/agency/');
            $timestamp = now()->timestamp;
            // Update screen logo if provided
            if ($request->hasFile('app_logo')) {
                // Generate unique filename based on title
                $screen_logo_filename = Str::slug($request->input('app_name')). '-' . $timestamp .'-app-logo.' . $request->file('app_logo')->getClientOriginalExtension();
    
                // Delete old screen logo if exists
                $old_screen_logo = $successInfo->app_logo;
                if (Storage::disk('local')->exists($uploadPath . '/' .$old_screen_logo)) {
                    Storage::disk('local')->delete($uploadPath . '/' .$old_screen_logo);
                }
    
                // Upload new screen logo
                $request->file('app_logo')->move(base_path('../upload-files/agency/'), $screen_logo_filename);
                $successInfo->app_logo = 'upload-files/agency/' . $screen_logo_filename;
            }
    
            // Save changes to the database
            $successInfo->save();
    
            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        }
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $successInfo = agencies::find($request->input('id'));

            if (order::where('agency_id', $successInfo->id)->exists()) {
                return response()->json(['status' => false, 'message' => 'Cannot delete agency. Related orders exist.']);
            }
    
            // Delete files from the directory
            $screen_logo_path = $successInfo->app_logo;
          // Inside your method
            $uploadPath = storage_path('../upload-files/agency/');
            if (Storage::disk('local')->exists($uploadPath . '/' . $screen_logo_path)) {
                Storage::disk('local')->delete($uploadPath . '/' . $screen_logo_path);
            }
         
            // Delete record from the database
            $successInfo->delete();
    
            return response()->json(['status' => true, 'message' => 'Data deleted successfully']);
        }
    }


    public function fetchUpdateModal(Request $request)
    {
        if ($request->ajax()) {
            // Fetch todo item details based on the provided ID
            $itemData = agencies::findOrFail($request->input('id')); // Use input() method to retrieve the ID
        
            // Render the update modal content dynamically
            $modalContent = view('admin.modals.update-agency', ['itemData' => $itemData])->render(); // Adjust the view path
        
            return response()->json(['status' => true, 'modalContent' => $modalContent]);
        }
    }
    
}
