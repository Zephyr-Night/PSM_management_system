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
        $result = new inventoryUsage();

        $inventorylist = $result->indexmodel();

       return view('inventoryusage.index',compact(['inventorylist']));
    }


    public function create()
    {

        $result = new inventoryUsage();

        $inventoryItem = $result->create();

        return view('inventoryusage.request',compact(['inventoryItem']));
    }


    public function store(Request $request)
    {
        $result = new inventoryUsage();

        $data = $request;

        $result->store($data);

        return redirect('inventory');
    }


    //cancel request
    public function destroy($id)
    {
        $result = new inventoryUsage();

        $data = $id;

        $result->deleteinventory($data);


        return redirect('inventory');
    }

    //display list of data that have value status == Approve only
    public function studentApprovelist()
    {
        $result = new inventoryUsage();

        $listAllapprove = $result->studentApprovelist();

        return view('inventoryusage.approveliststudent',compact('listAllapprove'));

    }

    //display index admin dashboard
    public function listRequestLecture()
    {
        $result = new inventoryUsage();

        $listAll = $result->listRequestLecture();

        return view('inventoryusage.listrequest',compact('listAll'));
    }

    //display approve list  for lecture
    public function listApprovetLecture()
    {
        $result = new inventoryUsage();

        $listAllApprove = $result->listApprovetLecture();

        return view('inventoryusage.lectureapprovelist',compact('listAllApprove'));

    }

    public function update(Request $request, $id)
    {
        $result = new inventoryUsage();

        $data = $request;
        $dataid = $id;

        $result->updateinventory($data,$dataid);

        // return redirect('listRequestLecture')->with('message', 'The success message!');
        return redirect('listRequestLecture');
    }





}
