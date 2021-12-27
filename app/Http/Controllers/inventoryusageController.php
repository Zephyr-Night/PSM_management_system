<?php

namespace App\Http\Controllers;

use App\Models\inventoryitemModel;
use App\Models\inventoryUsage;
use App\Models\studentprofileModel;
use App\Models\lectureprofileModel;
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
        $inventorylist = inventoryUsage::Select()->where('studentId',$user->studentId)->where('status','LIKE','pending')->with('inventoryitem')->get();

       return view('inventoryusage.index',compact(['inventorylist']));
    }


    public function create()
    {
        //get list inventoryname and id if value not 0
        $inventoryItem = inventoryitemModel::Select()->where('quantity','!=',0)->get();

        return view('inventoryusage.request',compact(['inventoryItem']));
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
        $addinventory = new inventoryUsage($inventoryusage + ['status'=>'pending']);

        //save data in function studentprofileModel called inventoryusage()
        $user->inventoryusage()->save($addinventory);


        return redirect('inventory');
    }

    public function destroy($id)
    {
        $deleterequest = inventoryUsage::findOrFail($id);
        $deleterequest->delete();

        return redirect('inventory');
    }

    //display list of data that have value status == Approve only
    public function studentApprovelist()
    {
        $listAllapprove = inventoryUsage::Select()->where('status','like','Approve')->with('studentprofile')->with('lectureprofile')->get();

        return view('inventoryusage.approveliststudent',compact('listAllapprove'));

    }

    //display index admin dashboard
    public function listRequestLecture()
    {
        $listAll = inventoryUsage::Select()->where('status','LIKE','pending')->with('studentprofile')->get();

        return view('inventoryusage.listrequest',compact('listAll'));

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
        $postupdate = inventoryUsage::whereid($id)->first();

        //retrive user Primary Key data by using session (get from LoginController)
        $getsession = $request->session()->get('userprimarykey');

        //create object of class model lectureprofileModel
        $user = new lectureprofileModel();

       //find the first user_id data (foreign key) in db (table: lectureprofile)
       $user = $user::where('user_id',$getsession)->firstOrFail();



        switch($request->submitbutton)
        {
            case 'Approve Request':

            $postupdate->status = "Approve";

           $user->inventoryusage()->save($postupdate);


            //get quantity value from inventoryitemModel model
            $valueInventoryitem = $postupdate->inventoryitem->quantity;

            //  latest quantity value  = quantity value -1
            $latestvalue = $valueInventoryitem - 1;

            //get itemId primary key
            $foreignkeyItemId = $postupdate->itemId;

            //find itemId in db
            $updateinventoryItem = inventoryitemModel::where('itemId',$foreignkeyItemId)->first();

            //update latest quantity value
            $updateinventoryItem->quantity = $latestvalue;

            //update data
            $updateinventoryItem->save();

            // return redirect('listRequestLecture')->with('message', 'The success message!');
            return redirect('listRequestLecture');

            break;
            case 'Reject Request':

            $postupdate->status = "Reject";

            $user->inventoryusage()->save($postupdate);

            return redirect('listRequestLecture');

            break;
        }

    }





}
