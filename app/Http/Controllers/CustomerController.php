<?php

namespace App\Http\Controllers;

use App\Imports\CustomersImport;
use App\Customer;
use App\Exports\CustomersExport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function welcome()
    {
        return redirect()->route('customers.index');
    }
    public function import_excel()
    {
        Excel::import(new CustomersImport(), request()->file('target_excel'));
        return redirect()->route('customers.index')->with('success', 'Customers have been Addded Sucessfully!!!.');
    }
    public function export_excel(){
        Log::info(['$paramList' => 'asdasdasd']);
        return Excel::download(new CustomersExport, 'Remaining Customers' . \Carbon\Carbon::parse(now())->format('d_m_Y_h_i_s') . '.xlsx');
    }
    public function index()
    {
        $customers = Customer::orderBy('name', 'ASC')->get();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }
    public function store(Request $request)
    {
        Customer::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'gender' => $request->gender,
            'is_married' => $request->is_married,
            'status' => $request->status,
        ]);
        return redirect()->route('customers.index')->with('success', 'Customer has been Addded Sucessfully  !!!.');
    }
    public function edit($id)
    {
        $customers = Customer::where('id', $id)->first();
        return view('customers.edit',compact('customers'));
    }
    public function update(Request $request, $id){
        $customer = Customer::where('id', $id)->firstOrFail();
        $customer->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'gender' => $request->gender,
            'is_married' => $request->is_married,
            'status' => $request->status,
        ]);
        return redirect()->route('customers.index')->with('success', 'Customer has been Updated Sucessfully  !!!.');

    }
    public function delete(Request $request){
        $customer = Customer::where('id', $request->customer_id)->firstOrFail();
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer has been Deleted Sucessfully  !!!.');

    }
}
