<?php

namespace App\Http\Controllers;

use App\Models\inventoryitemModel;
use App\Models\inventoryUsage;
use App\Models\studentprofileModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class inventoryusageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventoryItem = inventoryitemModel::all(['inventoryname']);
        return view('inventoryusage.request',compact('inventoryItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //retrive user Primary Key data by using session (get from LoginController)
        $getsession = $request->session()->get('userprimarykey');




        $studentprofile = new studentprofileModel;
        $student = $studentprofile::where('user_id', $getsession)->firstOrFail();

        // inventoryUsage::create($request->all());
        // return redirect('inventory/create');
        return $getsession;
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
}
