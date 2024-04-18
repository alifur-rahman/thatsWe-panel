<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\coPdf;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;

class OrdePdfrConentController extends Controller
{
    public function index()
    {
        $coPdfInfo = coPdf::limit(1)->first();
        return view('admin.content.order-pdf', ['coPdfInfo' => $coPdfInfo]);
    }
    public function submit(Request $request)
    {
        if ($request->ajax()) {
            $type = $request->input('type');
            if($type === 'header'){
                $validation_rules = [
                    'title_en' => 'required',
                    'title_de' => 'required',
                ];
            
                $custom_messages = [
                    'title_en.required' => ' Fields are required.',
                    'title_de.required' => ' Fields are required.',
                ];
            
                $validator = Validator::make($request->all(), $validation_rules, $custom_messages);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => 'Fill all required fields', 'errors' => $validator->errors()]);
                }
               
            }else if($type === 'main_content'){
                $validation_rules = [
                    'txt_en' => 'required',
                    'txt_de' => 'required',
                ];
            
                $custom_messages = [
                    'txt_en.required' => ' Fields are required.',
                    'txt_de.required' => ' Fields are required.',
                ];
            
                $validator = Validator::make($request->all(), $validation_rules, $custom_messages);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => 'Fill all required fields', 'errors' => $validator->errors()]);
                }

            }


            $coPdfInfo = coPdf::first();

            // If a record exists, update it; otherwise, create a new one
            if ($coPdfInfo) {
                // Update existing record
                $coPdfInfo->update($request->except('_token', 'id')); // Exclude _token and id from the update data
            } else {
                // Create a new record
                coPdf::create($request->except('_token'));
            }
            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
            
         

            // foreach ($request->all() as $name => $value) {
            //     // Skip inputs that are not meant for updating the database
            //     if ($name !== '_token') {
            //         // Update the column corresponding to the input name
            //         coOrderInfo::updateOrCreate(['id' => $request->input('id')], [$name => $value]);
            //     }
            // }

            // Check if there is any existing record
                // $coOrderInfo = co_order::first();

                // // If a record exists, update it; otherwise, create a new one
                // if ($coOrderInfo) {
                //     // Update existing record
                //     $coOrderInfo->update($request->except('_token', 'id')); // Exclude _token and id from the update data
                // } else {
                //     // Create a new record
                //     coOrderInfo::create($request->except('_token'));
                // }

        
            // If validation passes and save_as is not "drift", save the data
            // return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        }
    }
}

