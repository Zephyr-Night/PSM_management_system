<?php

namespace App\Http\Controllers;

use App\Models\inventoryitemModel;
use App\Models\inventoryUsage;
use App\Models\studentprofileModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class inventoryusageController extends Controller
{

    public function index()
    {
        //retrive user Primary Key data by using session (get from LoginController)
        $getsession = session()->get('userprimarykey');

        //create object of class model studentprofileModel
        $user = new studentprofileModel();

        //find the first user_id data (foreign key) in db (table: studentprofile)
        $user = $user::where('user_id',$getsession)->firstOrFail();

        //get all inventoryUsage primary key for specific user
        //use 'with()' in order to access data from other table by using foreign key (itemId)
        //go to inventoryUsage function inventoryitem()
        $inventorylist = inventoryUsage::Select()->where('studentId',$user->studentId)->with('inventoryitem')->get();

       return view('inventoryusage.index',compact(['inventorylist']));
    }


    public function create()
    {
        //get list inventoryname and id
        $inventoryItem = inventoryitemModel::all(['inventoryname','itemId']);
        return view('inventoryusage.request',compact(['inventoryItem',]));
    }

    public function store(Request $request)
    {
        //retrive user Primary Key data by using session (get from LoginController)
        $getsession = $request->session()->get('userprimarykey');

        //create object of class model studentprofileModel
        $user = new studentprofileModel();

        //find the first user_id data (foreign key) in db (table: studentprofile)
        $user = $user::where('user_id',$getsession)->firstOrFail();

        //retieve all input data
        $inventoryusage = $request->all();

        //create object of class model inventoryusage
        $addinventory = new inventoryUsage($inventoryusage);

        //save data in function studentprofileModel called inventoryusage()
        $user->inventoryusage()->save($addinventory);


        return redirect('inventory');
    }


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
