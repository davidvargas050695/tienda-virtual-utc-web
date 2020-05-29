<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMerchantPost;
use App\Http\Requests\StoreMerchantValidatePost;
use App\Merchant;
use App\RequestForm;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $merchants = Merchant::orderBy('created_at','ASC')->get();

        return view('admin.merchants.index', compact('merchants'));
    }
    public function getRequestMerchants()
    {
        $request_merchants = RequestForm::orderBy('created_at', 'ASC')->get();

        $parameter = '';
        return view('admin.merchants.list_request', compact('request_merchants', 'parameter'));
    }
    public function showRequest($id)
    {
        $request = RequestForm::find($id);
        return view('admin.merchants.showRequest', compact('request'));
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
    public function store(StoreMerchantValidatePost $request, $id)
    {


        if ($request->status == "denegado") {
            $request_merchant = RequestForm::find($id);
            $request_merchant->status = $request->status;
            $request_merchant->save();
            return redirect()->route('get-request-merchants');

        } else if($request->status == "aprobado" ||$request->status == "revision"){
            $validate = $request->validated();
            try {

                DB::beginTransaction();
                $user = new User();
                $user->ci = $request->ci;
                $user->ruc = $request->company_ruc;
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->username = $request->name. time();
                $user->email = $request->email;
                $user->gender = $request->gender;
                $user->birth_date = $request->birth_date;
                $user->url_image = $this->UploadImage($request);
                $user->password = $this->generatePassword($request->ci);
                $user->save();
                $role = Role::findById(3);
                $user->assignRole($role);

                $merchant = new Merchant();
                $merchant->company_name = $request->company_name;
                $merchant->company_ruc = $request->company_ruc;
                $merchant->company_address = $request->company_address;
                $merchant->company_type = $request->company_type;
                $merchant->company_description = $request->company_description;
                $merchant->longitude = $request->longitude;
                $merchant->latitude = $request->latitude;
                $merchant->url_merchant = $this->UploadImageMerchant($request);

                $merchant->id_user = $user->id;
                $merchant->save();

                $request_merchant = RequestForm::find($id);
                $request_merchant->status = $request->status;
                $request_merchant->save();


                DB::commit();

                return redirect()->route('get-merchants');
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->route('get-request-merchants');
            }
        }else{
            return redirect()->route('get-request-merchants');
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
    public function UploadImageMerchant(Request $request)
    {
        $url_file = "img/merchants/";
        if ($request->file('url_merchant')) {
            $image = $request->file('url_merchant');
            $name = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path($url_file) . $name);
            return $url_file . $name;
        } else {
            return "#";
        }
    }
}
