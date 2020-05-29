<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliveryManPost;
use App\Http\Requests\StoreMerchantPost;
use App\RequestForm as AppRequestForm;
use App\RequestFormDeliveryMan;
use Illuminate\Http\Request;

class RequestForm extends Controller
{

    //create solicitud del empresario

    public function createMerchant()
    {
       return view('forms.merchant');
    }

    //store solicitud del repartidor

    public function createdeliveryMan()
    {
       return view('forms.deliveryman');
    }
    //create solicitud del repartidor

    public function storeMarchant(StoreMerchantPost $request)
    {
         /*name,last_name,ci,address,phone,email,company_name,company_ruc,company_address,company_type, company_description*/

         $validate = $request->validated();

         $request_merchant = new AppRequestForm();
         $request_merchant->name = $request->name;
         $request_merchant->last_name = $request->last_name;
         $request_merchant->ci = $request->ci;
         $request_merchant->address = $request->address;
         $request_merchant->phone = $request->phone;
         $request_merchant->email = $request->email;
         $request_merchant->company_name = $request->company_name;
         $request_merchant->company_ruc = $request->company_ruc;
         $request_merchant->company_address = $request->company_address;
         $request_merchant->company_type = $request->company_type;
         $request_merchant->company_description = $request->company_description;
         $request_merchant->save();

         return redirect()->route('create-merchant');
    }

    //store solicitud del repartidor
    public function storeDeliveryMan(StoreDeliveryManPost $request)
    {
         /*name,last_name,ci,address,phone,email,vehicle_type,vehicle_plate,vehicle_year,vehicle_make, vehicle_description*/

         $validate = $request->validated();
         $request_merchant = new RequestFormDeliveryMan();
         $request_merchant->name = $request->name;
         $request_merchant->last_name = $request->last_name;
         $request_merchant->ci = $request->ci;
         $request_merchant->address = $request->address;
         $request_merchant->phone = $request->phone;
         $request_merchant->email = $request->email;
         $request_merchant->vehicle_type = $request->vehicle_type;
         $request_merchant->vehicle_plate = $request->vehicle_plate;
         $request_merchant->vehicle_year = $request->vehicle_year;
         $request_merchant->vehicle_make = $request->vehicle_make;
         $request_merchant->vehicle_description = $request->vehicle_description;
         $request_merchant->save();

         return redirect()->route('create-deliveryman');

    }
}
