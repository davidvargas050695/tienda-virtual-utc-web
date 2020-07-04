<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DeliveryMan;
use App\Merchant;
use App\Order;
use App\RequestForm;
use App\RequestFormDeliveryMan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::orderBy('id', 'ASC')->get(['id']);
        $orders = Order::orderBy('id', 'ASC')->get(['id']);
        $deliverymen = DeliveryMan::where('status', 'aprobado')->get(['id']);
        $merchants = Merchant::where('status', 'aprobado')->get(['id']);
        $merchants_lasted = Merchant::latest()
            ->take(5)
            ->get();
        $deliverymen_lasted = DeliveryMan::latest()
            ->take(5)
            ->get();
        $request_deliverymen = RequestFormDeliveryMan::where('status','revision')->orderBy('created_at', 'ASC')
            ->latest()
            ->take(5)
            ->get();
        $request_merchants = RequestForm::where('status','revision')->orderBy('created_at', 'ASC')
            ->latest()
            ->take(5)
            ->get();


        return view('admin.dashboard.index',
            compact('customers',
                'merchants',
                'orders',
                'deliverymen',
                'merchants_lasted',
                'deliverymen_lasted',
                'request_deliverymen',
                'request_merchants'
            ));
    }
}
