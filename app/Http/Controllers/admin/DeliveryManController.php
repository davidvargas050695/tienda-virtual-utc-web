<?php

namespace App\Http\Controllers\admin;

use App\CompanyType;
use App\DeliveryMan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryManValidatePost;
use App\RequestFormDeliveryMan;
use Illuminate\Http\Request;

use App\User;
use App\VehicleType;
use Exception;
use Spatie\Permission\Models\Role;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DeliveryManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliverymen = DeliveryMan::orderBy('created_at','ASC')->get();

        $vehicles = VehicleType::where('status', 'activo')
        ->orderBy('name', 'ASC')
        ->pluck('name', 'id');

        return view('admin.deliveryman.index', compact('deliverymen','vehicles'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryManValidatePost $request,$id)
    {


        if ($request->status == "denegado") {
            $request_deliveryman = RequestFormDeliveryMan::find($id);
            $request_deliveryman->status = $request->status;
            $request_deliveryman->save();
            return redirect()->route('get-request-deliverymen');

        } else if($request->status == "aprobado" ||$request->status == "revision"){
            $validate = $request->validated();
            try {

                DB::beginTransaction();
                //CREAMOS UN NUEVO USUARIO
                $user = new User();
                $user->ci = $request->ci;
                $user->ruc = $request->company_ruc;
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->username = $request->name . time();
                $user->email = $request->email;
                $user->gender = $request->gender;
                $user->birth_date = $request->birth_date;
                $user->url_image = $this->UploadImage($request);
                $user->password = $this->generatePassword($request->ci);
                $user->save();
                $role = Role::findById(3);
                $user->assignRole($role);

                ///GURADAMOS LA TABLA DELIVERMAN
                $deliveryman = new DeliveryMan();
                $deliveryman->vehicle_type = $request->vehicle_type;
                $deliveryman->vehicle_plate = $request->vehicle_plate;
                $deliveryman->vehicle_year = $request->vehicle_year;
                $deliveryman->vehicle_make = $request->vehicle_make;
                $deliveryman->vehicle_description = $request->vehicle_description;
                $deliveryman->url_vehicle = $this->UploadImageDeliveryMan($request);;
                $deliveryman->id_user = $user->id;
                $deliveryman->save();

                //cambiamos el estado de la peticion
                $request_deliveryman = RequestFormDeliveryMan::find($id);
                $request_deliveryman->status = $request->status;
                $request_deliveryman->save();


                DB::commit();

                return redirect()->route('get-deliverymen');
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->route('get-request-deliverymen');
            }
        }else{
            return redirect()->route('get-request-deliverymen');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getRequestDeliveryMen()
    {
        $request_deliverymen = RequestFormDeliveryMan::orderBy('created_at', 'ASC')->get();


        return view('admin.deliveryman.list_request', compact('request_deliverymen'));
    }
    public function showRequest($id)
    {
        $request = RequestFormDeliveryMan::find($id);
        $vehicles = VehicleType::where('status', 'activo')
        ->orderBy('name', 'ASC')
        ->pluck('name', 'id');
        return view('admin.deliveryman.showRequest', compact('request','vehicles'));
    }
    public function generatePassword($password)
    {
        $user_password = Hash::make($password);
        return $user_password;
    }
    public function UploadImage(Request $request)
    {
        $url_file = "img/users/";
        if ($request->file('url_image')) {
            $image = $request->file('url_image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path($url_file) . $name);
            return $url_file . $name;
        } else {
            return "#";
        }
    }
    public function UploadImageDeliveryMan(Request $request)
    {
        $url_file = "img/deliverymen/";
        if ($request->file('url_vehicle')) {
            $image = $request->file('url_vehicle');
            $name = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path($url_file) . $name);
            return $url_file . $name;
        } else {
            return "#";
        }
    }
}
