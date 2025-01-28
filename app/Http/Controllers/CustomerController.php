<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 

        //$customers = Customer::get();

        $customers = DB::connection('CRM')->table('customers')->get();

        return view('customers/customers', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //$customer = Customer::where('customer_id', $id)->firstOrFail();
        //dd($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::where('customer_id', $id)->firstOrFail();
        return view('customers/customers_edit', ['customer' => $customer]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $data = request()->validate([ 
            'Name' => 'string',
            'Phone' => 'string',
            'Email' => 'string'
        ]);
        $dbData = [
            'customer_name' => $data['Name'],
            'customer_phone' => $data['Phone'],
            'customer_Email' => $data['Email']
        ];

        $customer = Customer::findOrFail($id);
        $customer->update($dbData);
        return redirect()->route('customers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DB $dB)
    {
        //
    }
}
