<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\AgencyZip;
use App\Models\admin\order;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;;

class AgencyZipController extends Controller
{
    public function index()
    {
        return view('admin.agencies-zip');
    }

    public function data_retrive(Request $request)
    {
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');
        $order = $_POST['order'][0]["column"];
        $orderDir = $_POST["order"][0]["dir"];
       $columns = ['zip', 'company_name', 'city', 'street', 'telephone', 'site_url', 'email','created_at'];
        $orderby = $columns[$order];
        // select type= 0 for trader 
        $result = AgencyZip::select('*');
        // return $result;

        //email filter
        $email = $request->mail_address;
        if ($email != "") {
            $result = $result->where('mail_address', 'LIKE', '%' . $email . '%');
        }

        //month filter
        $month = $request->month;
        if ($month != "") {
            if ($month == 'this_month') {
                $result = $result->whereMonth("created_at", '=', $month);
            } else {
                $date = Carbon::now()->subMonth()->format('Y-m-d');
                $result = $result->where("created_at", '>=', $date);
            }
        }
        //date filter
        $from = $request->input('value_from_start_date');
        if ($from != "") {
            $result = $result->whereDate("created_at", '>=', $from);
        }
        $to = $request->input('value_from_end_date');
        if ($to != "") {
            $result = $result->whereDate("created_at", '<=', $to);
        }


        $count = $result->count(); // <------count total rows
        $result = $result->orderby($orderby, $orderDir)->orderby('id', 'desc')->skip($start)->take($length)->get();
        $data = array();
        $i = 0;

        foreach ($result as $key => $value) {
           $deleteButton = '<button type="button" class="btn btn-icon btn-flat-danger waves-effect"
                                data-success-delete="' . $value->id . '">
                                <i data-feather="trash" ></i>
                            </button>';
            $editButton = '<button type="button" class="btn btn-icon btn-flat-info waves-effect"
                            data-success-edit="' . $value->id . '">
                            <i data-feather="edit" ></i>
                        </button>';
            // tabl column
            $data[$i]["zip"]         = $value->zip;
            $data[$i]["company_name"]         =  $value->company_name;
            $data[$i]["city"]     = $value->city;
            $data[$i]["street"]         = $value->street;
            $data[$i]["telephone"]     = $value->telephone;
            $data[$i]["www"]     = $value->site_url;
            $data[$i]["mail_address"]     = $value->email;
            
            $data[$i]["action"]     = $editButton.$deleteButton;
            $i++;
        }

        $output = array('draw' => $_REQUEST['draw'], 'recordsTotal' => $count, 'recordsFiltered' => $count);
        $output['data'] = $data;
        $output['chekc'] = $result;
        return Response::json($output);
    }

    public function submit(Request $request)
    {
        if ($request->ajax()) {
            $validation_rules = [
                'zip' => 'required',
                'company_name' => 'required',
                'city' => 'required',
                'street' => 'required',
                'site_url' => 'required',
                'telephone' => 'required',
                'email' => 'required',
            ];
        
            $validator = Validator::make($request->all(), $validation_rules);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Fill all required fields', 'errors' => $validator->errors()]);
            }
        
            // If validation passes and save_as is not "drift", save the data
            $successInfo = AgencyZip::create($request->all());
            return response()->json(['status' => true, 'message' => 'Data saved successfully']);
        }
        
    }

    public function fetchUpdateModal(Request $request)
    {
        if ($request->ajax()) {
            // Fetch todo item details based on the provided ID
            $itemData = AgencyZip::findOrFail($request->input('id')); // Use input() method to retrieve the ID
        
            // Render the update modal content dynamically
            $modalContent = view('admin.modals.update-agency-zip', ['itemData' => $itemData])->render(); // Adjust the view path
        
            return response()->json(['status' => true, 'modalContent' => $modalContent]);
        }
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $validation_rules = [
                'zip' => 'required',
                'company_name' => 'required',
                'city' => 'required',
                'street' => 'required',
                'site_url' => 'required',
                'telephone' => 'required',
                'email' => 'required',
            ];
        
            $validator = Validator::make($request->all(), $validation_rules);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Fill all required fields', 'errors' => $validator->errors()]);
            }

            foreach ($request->all() as $name => $value) {
                // Skip inputs that are not meant for updating the database
                if ($name !== '_token') {
                    // Update the column corresponding to the input name
                    AgencyZip::updateOrCreate(['id' => $request->input('id')], [$name => $value]);
                }
            }
        
            // If validation passes and save_as is not "drift", save the data
            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        }
        
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $orderInfo = AgencyZip::find($request->input('id'));

            
            // Delete record from the database
            $orderInfo->delete();
    
            return response()->json(['status' => true, 'message' => 'Data deleted successfully']);
        }
    }
}
