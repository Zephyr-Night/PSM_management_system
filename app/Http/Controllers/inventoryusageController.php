<?php

namespace App\Http\Controllers;

use App\Models\inventoryitemModel;
use App\Models\inventoryusageModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class inventoryusageController extends Controller
{
    public function index()
    {
        $result = new inventoryUsageModel();

        $inventorylist = $result->indexmodel();

       return view('inventoryusage.index',compact(['inventorylist']));
    }


    public function create()
    {

        $result = new inventoryUsageModel();

        $inventoryItem = $result->create();

        return view('inventoryusage.request',compact(['inventoryItem']));
    }


    public function store(Request $request)
    {
        $result = new inventoryUsageModel();

        $data = $request;

        $result->store($data);

        return redirect('inventory');
    }


    //cancel request
    public function destroy($id)
    {
        $result = new inventoryUsageModel();

        $data = $id;

        $result->deleteinventory($data);


        return redirect('inventory');
    }


    //display index admin dashboard
    public function listRequestLecture()
    {
        $result = new inventoryUsageModel();

        $listAll = $result->listRequestLecture();

        return view('inventoryusage.listrequest',compact('listAll'));
    }

    //display approve list  for lecture
    public function listApprovetLecture()
    {
        $result = new inventoryUsageModel();

        $listAllApprove = $result->listApprovetLecture();

        return view('inventoryusage.lectureapprovelist',compact('listAllApprove'));

    }

    //approve / reject
    public function update(Request $request, $id)
    {
        $result = new inventoryUsageModel();

        $data = $request;
        $dataid = $id;

        $result->updateinventory($data,$dataid);

        // return redirect('listRequestLecture')->with('message', 'The success message!');
        return redirect('listRequestLecture');
    }

    //student s
    public function show($id)
    {
        $result = new inventoryUsageModel();

        $detailinventory = $result->infoRequest($id);

        return view('inventoryusage.detailsrequest',compact('detailinventory'));
    }



}
