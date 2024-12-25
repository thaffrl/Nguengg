<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeCustomerController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        $pageTitle = 'Silahkan Isi Form Anda';
        
        return view('homecustomer', compact('pageTitle', 'cars'));
        
    }
    public function create()
    {
        $pageTitle = 'Create Customer';
    
        // ELOQUENT
        $cars = Car::all();
    
        return view('customer.create', compact('pageTitle', 'cars'));
    }
    
    public function store(Request $request)
{
    $messages = [
        'required' => ':Attribute harus diisi.',
        'email' => 'Isi :attribute dengan format yang benar',
        'numeric' => 'Isi :attribute dengan angka'
    ];

    $validator = Validator::make($request->all(), [
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|email',
        'age' => 'required|numeric',
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // ELOQUENT
    $customer = New customer;
    $customer->firstname = $request->firstName;
    $customer->lastname = $request->lastName;
    $customer->email = $request->email;
    $customer->age = $request->age;
    $customer->car_id = $request->car;
    $customer->save();

    return redirect()->route('customers.index');
}
}