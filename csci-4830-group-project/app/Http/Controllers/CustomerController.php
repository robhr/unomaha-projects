<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Purchase;

class CustomerController extends Controller
{
    /** 
     * Display a single resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer($id)
    {
        return view('pages.customer')->with('id', $id);
    }

    /** 
     * Return customer report
     *
     * @return \Illuminate\Http\Response
     */
    public function report($id)
    {
        return Purchase::where('customer_id', '=', $id)->with('customer')->with('project')->get();
    }

    /** 
     * Add customer
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        return Customer::create($request->all());
    }

    /** 
     * Delete customer
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return 204;
    }
}
