<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\order;
use App\Models\admin\AgencyZip;
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
       $columns = ['company_name', 'street', 'zip', 'city', 'country', 'telephone','www','mail_address','managing_director','ip','created_at'];
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
        $result = $result->orderby($orderby, $orderDir)->orderby('id', 'desc')->skip($start)->take($length)->get();
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

        $isZipAgency = AgencyZip::where('ref', $id)->exists();
        
        $description = view('admin.rander.order-details', ['itemData' => $itemData], ['isZipAgency' => $isZipAgency])->render();
       
        $data = [
            'status' => true,
            'description' => $description
        ];
        return Response::json($data);
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $orderInfo = Order::find($request->input('id'));

            
            // Delete record from the database
            $orderInfo->delete();
    
            return response()->json(['status' => true, 'message' => 'Data deleted successfully']);
        }
    }


    public function add_to_agency_zip(Request $request){
        if ($request->ajax()) {
            $order_id = $request->input('order_id');
            $orderInfo = Order::find($order_id);
            if(!$orderInfo){
                return response()->json(['status' => false, 'message' => 'Order Not Found']);
            }else{
                $agencyZip = new AgencyZip();
                $isZipAgency = $agencyZip->where('ref', $order_id)->exists();

                 // Create a new record in the agency_zip table based on order information
                if(!$isZipAgency){
                    $agencyZip = new AgencyZip();
                    $agencyZip->zip = $orderInfo->zip;
                    $agencyZip->company_name = $orderInfo->company_name;
                    $agencyZip->city = $orderInfo->city;
                    $agencyZip->street = $orderInfo->street;
                    $agencyZip->site_url = $orderInfo->www;
                    $agencyZip->telephone = $orderInfo->telephone;
                    $agencyZip->email = $orderInfo->mail_address;

                    // Assuming $orderInfo->ref contains the reference to associate with the agency_zip record
                    $agencyZip->ref = $order_id;

                    // Save the agency_zip record
                    $agencyZip->save();
                    $resultBoxElement = "#zip_agency_resultBox-".$order_id;

                    $appendHtml = '
                    <div class="card mb-0">
                        <div class="card-body border-start-3 border-start-primary">
                            <div class="d-flex gap-2">
                                <div class="section-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100"
                                        height="100" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-thumbs-up icon-trd text-primary">
                                        <path
                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                        </path>
                                    </svg>
                                </div>
                                <div class="section-data">
                                    <div class="tv-title">
                                        This order details already added in agency by
                                        zip 
                                    </div>
                                    <div class="tv-total">

                                        <small> To see all go to <a target="_blank"
                                                href="'. route('agency.zip.show') .'">Agency By
                                                ZIP</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';

                    return response()->json(['status' => true, 'message' => 'Data saved successfully', 'resultBoxElement' => $resultBoxElement, 'appendHtml' => $appendHtml]);
                }else{
                    return response()->json(['status' => false, 'message' => 'Already Added']);
                }

                
            }
        }else{
            return response()->json(['status' => false, 'message' => 'Not Accessible Request']);
        }
    }
   
}
