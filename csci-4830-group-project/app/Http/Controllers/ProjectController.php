<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Purchase;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Project::all();
    }

    /** 
     * Display a single resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return Project::find($id);
    }

    /** 
     * Display a single resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customers($id)
    {
        $customers = Purchase::where('project_id', '=', $id)
                             ->join('customers', 'purchases.customer_id', '=', 'customers.id')
                             ->get();
                             
        return $customers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * Required fields: [customer_id, project_id, amount]
     * 
     * @return \Illuminate\Http\Response
     */
    public function purchase(Request $request)
    {
        return Purchase::create($request->all());
    }

    /** 
     * Delete customer purchase
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $purchase = Purchase::where('customer_id', $request->customer_id)->where('project_id', $request->project_id)->first();
        $purchase->delete();

        return 204;
    }
}
