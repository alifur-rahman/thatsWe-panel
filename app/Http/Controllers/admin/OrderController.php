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
        $order = $_GET['order'][0]["column"];
        $orderDir = $_GET["order"][0]["dir"];
        $columns = ['company_name', 'street', 'zip', 'city', 'country', 'telephone','www','mail_address','managing_director','agency_id'];
        $orderby = $columns[$order];
        // select type= 0 for trader 
        $result = order::select('id', 'company_name', 'street', 'zip', 'city', 'country', 'telephone','www','mail_address','managing_director','agency_id');
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
            $data[$i]["agency_id"]     = $value->agency_id;
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
        $causer = order::find($id);
        
       
        $description = '<tr class="description" style="display:none">
            <td >
                <div class="details-section-dark dt-details border-start-3 border-start-primary p-2">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="rounded-0 w-75">
                                <table class="table table-responsive tbl-balance">
                                    <tr>
                                        <th>Last Login</th>
                                        <td>fasdf</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>sadfasdf</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex justfy-content-between">    
                            <div class="rounded-0 w-100">
                                <table class="table table-responsive tbl-trader-details">
                                    <tr>
                                        <th>User Category</th>
                                        <td>asdf</td>
                                    </tr>
                                    <tr>
                                        <th>Country</th>
                                        <td>asdf</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>fasd</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>asdf</td>
                                    </tr>
                                </table>
                            </div> 
                           
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <!-- Filled Tabs starts -->
                            <div class="col-xl-12 col-lg-12">
                                <div class=" p-0">
                                    <div class=" p-0">
                                        <table class="tbl-activity-report table datatable-inner dt-inner-table-dark">
                                            <theader>
                                                <tr>
                                                    <th>Action IP</th>
                                                    <th>Action Country</th>
                                                    <th>Action city</th>
                                                    <th>Action Region</th>
                                                    <th>Action at</th>
                                                </tr>
                                            </theader>
                                            <theader>
                                                <tr>
                                                    <td>asdf</td>
                                                    <td>asdf</td>
                                                    <td>hasdf</td>
                                                    <td>asdf</td>
                                                    <td>sdf</td>
                                                </tr>
                                            </theader>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                 
                    <div class="clearfix"></div>
                </div>
            </td>
            <td class="d-none">&nbsp;</td>
            <td class="d-none">&nbsp;</td>
            <td class="d-none">&nbsp;</td>
            <td class="d-none">&nbsp;</td>


           
        </tr>';
        $data = [
            'status' => true,
            'description' => $description
        ];
        return Response::json($data);
    }
   
}
