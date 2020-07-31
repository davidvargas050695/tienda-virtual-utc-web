<?php

namespace App\Http\Controllers\admin;

use App\Company;
use App\Customer;
use App\DetailOrder;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Carbon\Carbon;
use Egulias\EmailValidator\Warning\ObsoleteDTEXT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function generatePDFOrder(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $user = User::find(Auth::user()->id);
            $customer = Customer::where('id_user', $user->id)->first();
            $company = Company::find($request->id_company);

            $date = Carbon::now()->toDateString();
            DB::beginTransaction();
            $order = new Order();
            $order->id_user = $user->id;
            $order->id_company = $company->id;
            $order->id_customer = $customer->id;
            $order->name_company = $company->company_name;
            $order->name_customer = $customer->name . " " . $customer->last_name;
            $order->order_number = "" . time();
            $order->latitude = "";
            $order->longitude = "";
            $order->date = $date;
            $order->total = $request->total_order;
            $order->save();

            $details = $request->detail_order;
            $data = json_decode($details, true);
            foreach ($data as $ep => $det) {
                $detail = new DetailOrder();
                $detail->id_order = $order->id;
                $detail->id_product = $det['id_product'];
                $detail->product_name = $det['name'];
                $detail->product_desc = $det['description'];
                $detail->quanty = $det['quanty'];
                $detail->price_total = $det['total_price'];
                $detail->price_unit = $det['price_unit'];
                $detail->save();

            }
            DB::commit();

            return response()->json([
                'success' => true
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'error' => $e
            ], 422);
        }


    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
