<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\order;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders');
    }

    public function data_retrive(Request $request)
    {
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');
        $order = $_POST['order'][0]["column"];
        $orderDir = $_POST["order"][0]["dir"];
        $columns = ['company_name', 'street', 'zip', 'city', 'country', 'telephone','www','mail_address','managing_director','agency_id'];
        $orderby = $columns[$order];
        // select type= 0 for trader 
        $result = order::select('*');
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
        $result = $result->orderby($orderby, $orderDir)->skip($start)->take($length)->get();
        $data = array();
        $i = 0;

        foreach ($result as $key => $value) {
           
            // tabl column
            // -------------------------------------
            $data[$i]["company_name"]         = '<a data-id="' . $value->id . '" href="#" class="dt-description  justify-content-start"><span class="w"> <i class="plus-minus" data-feather="plus"></i> </span><span>' . $value->company_name . '</span></a>';

            $data[$i]["street"]         = $value->street;
            $data[$i]["zip"]         = $value->zip;
            $data[$i]["city"]     = $value->city;
            $data[$i]["country"]     = $value->country;
            $data[$i]["telephone"]     = $value->telephone;
            $data[$i]["www"]     = $value->www;
            $data[$i]["mail_address"]     = $value->mail_address;
            $data[$i]["managing_director"]     = $value->managing_director;
            $data[$i]["ip"]     = $value->ip;
            $data[$i]["date"]    = date('d M y', strtotime($value->created_at));
            $i++;
        }

        $output = array('draw' => $_REQUEST['draw'], 'recordsTotal' => $count, 'recordsFiltered' => $count);
        $output['data'] = $data;
        $output['chekc'] = $result;
        return Response::json($output);
    }

    public function data_retrive_details(Request $request)
    {
        $id = $request->input('id');
        $itemData = Order::with('agency')->find($id);
        
        $description = view('admin.rander.order-details', ['itemData' => $itemData])->render();
       
        $data = [
            'status' => true,
            'description' => $description
        ];
        return Response::json($data);
    }
   
}
