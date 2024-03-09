<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\successInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SuccessInfoController extends Controller
{
    public function index()
    {
        $successInfo = SuccessInfo::all();
        return view('admin.success-info', compact('successInfo'));
       
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
}
