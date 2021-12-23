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
        //get list inventoryname and id
        $inventoryItem = inventoryitemModel::all(['inventoryname','itemId']);
        return view('inventoryusage.request',compact(['inventoryItem',]));
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

        $user = new studentprofileModel(['user_id'=>$getsession]);

        $inventoryusage = $request->all();

        $addinventory = new inventoryUsage($inventoryusage);

        $user->inventoryusage()->save($addinventory);






        return $inventoryusage;
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
