<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $pageTitle = 'Customer List';

    $customers = Customer::all();

    return view('customer.index', [
        'pageTitle' => $pageTitle,
        'customers' => $customers
    ]);

}

    /**
     * Show the form for creating a new resource.
     */
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
        'ktp' => 'required|numeric',
        'rentalDate' => 'required|date',
        'returnDate' => 'required|date|after_or_equal:rentalDate', // Pastikan returnDate setelah rentalDate
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // ELOQUENT
    $customer = new Customer;
    $customer->firstname = $request->firstName;
    $customer->lastname = $request->lastName;
    $customer->email = $request->email;
    $customer->age = $request->age;
    $customer->car_id = $request->car;
    $customer->ktp = $request->ktp;
    $customer->rentalDate = $request->rentalDate; // Simpan tanggal peminjaman
    $customer->returnDate = $request->returnDate; // Simpan tanggal kembalian
    $customer->save();

    return redirect()->route('customers.index');
}

public function edit(string $id)
{
    $pageTitle = 'Edit customer';

    // ELOQUENT
    $car = Car::all();
    $customer = Customer::find($id);

    return view('customer.edit', compact('pageTitle', 'car', 'customer'));
}
public function show(string $id)
{
    $pageTitle = 'Customer Detail';

    // ELOQUENT: Ambil data customer berdasarkan ID
    $customer = Customer::find($id);

    // Pastikan customer ditemukan
    if (!$customer) {
        return redirect()->route('customers.index')->with('error', 'Customer tidak ditemukan');
    }

    return view('customer.show', compact('pageTitle', 'customer'));
}
public function update(Request $request, string $id)
{
    $messages = [
        'required' => ':Attribute harus diisi.',
        'email' => 'Isi :attribute dengan format yang benar',
        'numeric' => 'Isi :attribute dengan angka',
        'after_or_equal' => ':attribute harus lebih besar atau sama dengan tanggal peminjaman.',
    ];

    $validator = Validator::make($request->all(), [
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|email',
        'age' => 'required|numeric',
        'ktp' => 'required|numeric',
        'rentalDate' => 'required|date',
        'returnDate' => 'required|date|after_or_equal:rentalDate', // Pastikan returnDate setelah rentalDate
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // ELOQUENT
    $customer = Customer::find($id);
    $customer->firstname = $request->firstName;
    $customer->lastname = $request->lastName;
    $customer->email = $request->email;
    $customer->age = $request->age;
    $customer->car_id = $request->car;
    $customer->ktp = $request->ktp;
    $customer->rentalDate = $request->rentalDate; // Update tanggal peminjaman
    $customer->returnDate = $request->returnDate; // Update tanggal kembalian
    $customer->save();

    return redirect()->route('customers.index');
}

    public function destroy(string $id)
    {
        // ELOQUENT
        Customer::find($id)->delete();

        return redirect()->route('customers.index');
    }
}
