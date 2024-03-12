<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\appImages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class AppImagesController extends Controller
{
    public function index()
    {
        return view('admin.app-images');
    }
    public function data_retrive(Request $request)
    {
        if ($request->ajax()) {
            $appImagesData = appImages::all();
        
            if ($appImagesData instanceof Collection && $appImagesData->isEmpty()) {
                // Handle the case where the filtered data is empty
                $data = '<div class="no-results d-block"><h5>No Items Found</h5></div>';
            } else {
                // Process the retrieved data
                $data = view('admin.rander.app-images', ['appImagesData' => $appImagesData])->render();
            }
        
            return response()->json(['status' => true, 'data' => $data, 'message' => 'Data retrieved successfully']);
        }
    }

    public function submit(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'screen_logo' => 'required|image|mimes:jpeg,png|max:2048',
                'screenshot' => 'required|image|mimes:jpeg,png|max:2048',
            ], [
                'title.required' => 'The title field is required.',
                'screen_logo.required' => 'Please upload screen logo.',
                'screen_logo.image' => 'The screen logo must be an image.',
                'screen_logo.mimes' => 'The screen logo must be a jpeg or png file.',
                'screen_logo.max' => 'The screen logo may not be greater than 2MB in size.',
                'screenshot.required' => 'Please upload screenshot.',
                'screenshot.image' => 'The screenshot must be an image.',
                'screenshot.mimes' => 'The screenshot must be a jpeg or png file.',
                'screenshot.max' => 'The screenshot may not be greater than 2MB in size.',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Fill all required fields', 'errors' => $validator->errors()]);
            }
    
            // Generate unique filenames with title and timestamp
            $title = $request->input('title');
            $timestamp = now()->timestamp;
            $screen_logo_filename = Str::slug($title) . '-' . $timestamp . '-screen-logo.' . $request->file('screen_logo')->getClientOriginalExtension();
            $screenshot_filename = Str::slug($title) . '-' . $timestamp . '-screenshot.' . $request->file('screenshot')->getClientOriginalExtension();
    
            // Move files to upload directory
            $request->file('screen_logo')->move(base_path('../upload-files/app-images/'), $screen_logo_filename);
            $request->file('screenshot')->move(base_path('../upload-files/app-images/'), $screenshot_filename);
        
            // Save data with uploaded file paths
            $data = $request->all();
            $data['screen_logo'] = 'upload-files/app-images/' . $screen_logo_filename;
            $data['screenshot'] = 'upload-files/app-images/' . $screenshot_filename;
            $successInfo = appImages::create($data);
        
            return response()->json(['status' => true, 'message' => 'Data saved successfully']);
        }
    }
    
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:app_images,id',
                'title' => 'required',
                'screen_logo' => 'nullable|image|mimes:jpeg,png|max:2048',
                'screenshot' => 'nullable|image|mimes:jpeg,png|max:2048',
            ], [
                'id.required' => 'The ID field is required.',
                'id.exists' => 'The specified ID does not exist.',
                'title.required' => 'The title field is required.',
                'screen_logo.image' => 'The screen logo must be an image.',
                'screen_logo.mimes' => 'The screen logo must be a jpeg or png file.',
                'screen_logo.max' => 'The screen logo may not be greater than 2MB in size.',
                'screenshot.image' => 'The screenshot must be an image.',
                'screenshot.mimes' => 'The screenshot must be a jpeg or png file.',
                'screenshot.max' => 'The screenshot may not be greater than 2MB in size.',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Validation error', 'errors' => $validator->errors()]);
            }
    
            $successInfo = appImages::find($request->input('id'));
    
            // Update title
            $successInfo->title = $request->input('title');
    
            $uploadPath = storage_path('../upload-files/app-images/');
            $timestamp = now()->timestamp;
            // Update screen logo if provided
            if ($request->hasFile('screen_logo')) {
                // Generate unique filename based on title
                $screen_logo_filename = Str::slug($request->input('title')). '-' . $timestamp .'-screen-logo.' . $request->file('screen_logo')->getClientOriginalExtension();
    
                // Delete old screen logo if exists
                $old_screen_logo = $successInfo->screen_logo;
                if (Storage::disk('local')->exists($uploadPath . '/' .$old_screen_logo)) {
                    Storage::disk('custom_disk')->delete($uploadPath . '/' .$old_screen_logo);
                }
    
                // Upload new screen logo
                $request->file('screen_logo')->move(base_path('../upload-files/app-images/'), $screen_logo_filename);
                $successInfo->screen_logo = 'upload-files/app-images/' . $screen_logo_filename;
            }
    
            // Update screenshot if provided
            if ($request->hasFile('screenshot')) {
                // Generate unique filename based on title
                $screenshot_filename = Str::slug($request->input('title')). '-' . $timestamp . '-screenshot.' . $request->file('screenshot')->getClientOriginalExtension();
    
                // Delete old screenshot if exists
                $old_screenshot = $successInfo->screenshot;
                if (Storage::disk('local')->exists($uploadPath . '/' .$old_screenshot)) {
                    Storage::disk('local')->delete($uploadPath . '/' .$old_screenshot);
                }
    
                // Upload new screenshot
                $request->file('screenshot')->move(base_path('../upload-files/app-images/'), $screenshot_filename);
                $successInfo->screenshot = 'upload-files/app-images/' . $screenshot_filename;
            }
    
            // Save changes to the database
            $successInfo->save();
    
            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        }
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $successInfo = appImages::find($request->input('id'));
    
            // Delete files from the directory
            $screen_logo_path = $successInfo->screen_logo;
            $screenshot_path = $successInfo->screenshot;
          // Inside your method
            $uploadPath = storage_path('../upload-files/app-images/');
            if (Storage::disk('local')->exists($uploadPath . '/' . $screen_logo_path)) {
                Storage::disk('local')->delete($uploadPath . '/' . $screen_logo_path);
            }
            if (Storage::disk('local')->exists($uploadPath . '/' . $screenshot_path)) {
                Storage::disk('local')->delete($uploadPath . '/' . $screenshot_path);
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
            $itemData = appImages::findOrFail($request->input('id')); // Use input() method to retrieve the ID
        
            // Render the update modal content dynamically
            $modalContent = view('admin.modals.update-appImage', ['itemData' => $itemData])->render(); // Adjust the view path
        
            return response()->json(['status' => true, 'modalContent' => $modalContent]);
        }
    }
    
}
