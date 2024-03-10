<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\SuccessInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;


class SuccessInfoController extends Controller
{
    public function index()
    {
       
        return view('admin.success-info');
       
    }


    public function data_retrive(Request $request)
    {
        if ($request->ajax()) {
            $filterType = $request->input('filterType');
        
            switch ($filterType) {
                case 'thatswe':
                    $successInfo = SuccessInfo::where('assign_to', 'ThatsWE')->get();
                    break;
                case 'thatssoft':
                    $successInfo = SuccessInfo::where('assign_to', 'ThatsSoft')->get();
                    break;
                case 'draft':
                    $successInfo = SuccessInfo::where('save_as', 'draft')->get();
                    break;
                case 'active':
                    $successInfo = SuccessInfo::where('save_as', 'active')->get();
                    break;
                default:
                    // If no filter type is specified or an invalid filter type is provided, retrieve all data
                    $successInfo = SuccessInfo::all();
                    break;
            }
        
            if ($successInfo instanceof Collection && $successInfo->isEmpty()) {
                // Handle the case where the filtered data is empty
                $data = '<div class="no-results d-block"><h5>No Items Found</h5></div>';
            } else {
                // Process the retrieved data
                $data = $this->showWithList($successInfo);
            }
        
            return response()->json(['status' => true, 'data' => $data, 'message' => 'Data retrieved successfully']);
        }
    }



    public function showWithList($data)
    {
        $html = '';
        foreach ($data as $key => $info) {
            $html .= '<li class="todo-item completed" data-id="' . $info->id . '">';
            $html .= '<div class="todo-title-wrapper">';
            $html .= '<div class="todo-title-area">'; // Assuming $loop is available
            // $html .= '<i data-feather="more-vertical" class=""></i>'; // Uncomment if needed
            $html .= '<div class="title-wrapper">';
            $html .= '<span class="todo-title">' . $info->title_en . '</span>'; // Assuming 'title_en' is the English title
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="todo-item-action">';
            $html .= '<div class="badge-wrapper me-1">';
            if ($info->save_as == 'draft') {
                $html .= '<span class="badge rounded-pill badge-light-warning">' . $info->save_as . '</span>';
            } else {
                $html .= '<span class="badge rounded-pill badge-light-success">' . $info->save_as . '</span>';
            }
            $html .= '</div>';
            $html .= '<small class="text-nowrap me-1 al_assign_name">' . $info->assign_to . '</small>'; // Assuming 'assign_to' holds the assignee name
            $html .= '<small class="text-nowrap text-muted me-1">' . $info->created_at->format('M d') . '</small>'; // Assuming 'created_at' holds the creation date
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</li>';

        }
    
        return $html;
    }

    public function fetchUpdateModal(Request $request)
    {
        if ($request->ajax()) {
            // Fetch todo item details based on the provided ID
            $todoItem = SuccessInfo::findOrFail($request->input('id')); // Use input() method to retrieve the ID
        
            // Render the update modal content dynamically
            $modalContent = view('admin.modals.update-info', ['todoItem' => $todoItem])->render(); // Adjust the view path
        
            return response()->json(['status' => true, 'modalContent' => $modalContent]);
        }
    }
    


    public function submit(Request $request)
    {
        if ($request->ajax()) {
            $saveAsValue = $request->input('save_as');
        
            if ($saveAsValue === 'drift') {
                $successInfo = SuccessInfo::create($request->all());
                return response()->json(['status' => true, 'message' => 'Data saved successfully']);
            }
        
            // If save_as is not "drift", perform validation
            $validation_rules = [
                'title_en' => 'required',
                'desc_en' => 'required',
                'assign_to' => 'required',
                'save_as' => 'required',
            ];
        
            $custom_messages = [
                'title_en.required' => 'The title field is required.',
                'desc_en.required' => 'The description field is required.',
                'assign_to.required' => 'The assign to field is required.',
                'save_as.required' => 'The save as field is required.',
            ];
        
            $validator = Validator::make($request->all(), $validation_rules, $custom_messages);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Fill all required fields', 'errors' => $validator->errors()]);
            }
        
            // If validation passes and save_as is not "drift", save the data
            $successInfo = SuccessInfo::create($request->all());
            return response()->json(['status' => true, 'message' => 'Data saved successfully']);
        }
        
    }
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $saveAsValue = $request->input('save_as');
        
            if ($saveAsValue === 'drift') {
                $successInfo = SuccessInfo::create($request->all());
                return response()->json(['status' => true, 'message' => 'Data saved successfully']);
            }
        
            // If save_as is not "drift", perform validation
            $validation_rules = [
                'title_en' => 'required',
                'desc_en' => 'required',
                'assign_to' => 'required',
                'save_as' => 'required',
                'id' => 'required'
            ];
        
            $custom_messages = [
                'title_en.required' => 'The title field is required.',
                'desc_en.required' => 'The description field is required.',
                'assign_to.required' => 'The assign to field is required.',
                'save_as.required' => 'The save as field is required.',
            ];
        
            $validator = Validator::make($request->all(), $validation_rules, $custom_messages);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Fill all required fields', 'errors' => $validator->errors()]);
            }

            foreach ($request->all() as $name => $value) {
                // Skip inputs that are not meant for updating the database
                if ($name !== '_token') {
                    // Update the column corresponding to the input name
                    SuccessInfo::updateOrCreate(['id' => $request->input('id')], [$name => $value]);
                }
            }
        
            // If validation passes and save_as is not "drift", save the data
            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        }
        
    }

  public function delete(Request $request)
    {
        if ($request->ajax()) {
            $successInfo = SuccessInfo::find($request->input('id'));
            $successInfo->delete();
            return response()->json(['status' => true, 'message' => 'Data deleted successfully']);
        }
    }
}
