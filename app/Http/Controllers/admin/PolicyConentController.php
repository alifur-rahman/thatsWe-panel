<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\CoPolicy;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;

class PolicyConentController extends Controller
{
    public function index()
    {
        $coPolicyInfo = CoPolicy::limit(1)->first();
        return view('admin.content.policy', ['coPolicyInfo' => $coPolicyInfo]);
    }
    public function submit(Request $request)
    {
        if ($request->ajax()) {
            $type = $request->input('type');
            if($type === 'dp'){
                $validation_rules = [
                    'dp_en' => 'required',
                    'dp_de' => 'required',
                ];
            
                $custom_messages = [
                    'dp_en.required' => ' Fields are required.',
                    'dp_de.required' => ' Fields are required.',
                ];
            
                $validator = Validator::make($request->all(), $validation_rules, $custom_messages);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => 'Fill all required fields', 'errors' => $validator->errors()]);
                }
               
            }else if($type === 'im'){
                $validation_rules = [
                    'im_en' => 'required',
                    'im_de' => 'required',
                ];
            
                $custom_messages = [
                    'im_en.required' => ' Fields are required.',
                    'im_de.required' => ' Fields are required.',
                ];
            
                $validator = Validator::make($request->all(), $validation_rules, $custom_messages);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => 'Fill all required fields', 'errors' => $validator->errors()]);
                }

            }


            $coPolicyInfo = CoPolicy::first();

            // If a record exists, update it; otherwise, create a new one
            if ($coPolicyInfo) {
                // Update existing record
                $coPolicyInfo->update($request->except('_token', 'id')); // Exclude _token and id from the update data
            } else {
                // Create a new record
                CoPolicy::create($request->except('_token'));
            }
            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
            
         
        }
    }
}
