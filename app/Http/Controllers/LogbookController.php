<?php

namespace App\Http\Controllers;

use App\Models\ApprovalModel;
use Illuminate\Http\Request;
use App\Models\LogbookModel;
class LogbookController extends Controller
{

    public function index()
    {
        $result = new LogbookModel();

        $listlogbookstudent = $result->listlogbook();
        $approve = $result->listlogbooktest();

        // print($approve);

        // print($listlogbookstudent);
      return view('logbook.index',compact(['listlogbookstudent','approve']));
    }


    public function create()
    {
        $result = new LogbookModel();
        $checksv = $result->checksv();

        return view('logbook.generatelogbook',compact(['checksv']));
    }


    public function store(Request $request)
    {
        $result = new LogbookModel();
        $data = $request;
        $result->store($data);

        return redirect('logbook');
    }


    public function show($id)
    {
        $result = new LogbookModel();
       $datauser = $result->showspecificlogbook($id);
       $approve = $result->listlogbooktest();

       return view('logbook.viewlogbookspecific',compact(['datauser','approve']));
    }

    public function edit($id)
    {
        $result = new LogbookModel();
        $data = $id;
        $editlogbookdata = $result->editlogbook($data);
        $checksv = $result->checksv();

        return view('logbook.editlogbook',compact(['editlogbookdata','checksv']));
    }

    public function update(Request $request, $id)
    {
        $result = new LogbookModel();
        $data = $request;
        $dataid = $id;
        $result->PUTmethod($data,$dataid);

        return redirect('logbook');
    }

    //delete the logbook data
    public function destroy($id)
    {
        $result = new LogbookModel();

        $data = $id;

        $result->deleteLogbook($data);


        return redirect('logbook');
    }

    public function indexlogbooklecture()
    {
        $result = new LogbookModel();
        $listlogbooklecture = $result->logbookstudent();
        $checkapprovestudent = $result->checkapprovestudent();
        // print($checkapprovestudent);

        return view('logbook.logbookstudent',compact(['listlogbooklecture','checkapprovestudent']));
    }

    public function verifylogbook( $id)
    {
        $result = new LogbookModel();
        $data = $id;
        $editlogbookdata = $result->verifylogbookmodel($data);
        $value = $editlogbookdata->studentId;
        $checksv = $result->checklecturedataindashboard($value);

        // print($editlogbookdata);

        return view('logbook.verifylogbook',compact(['editlogbookdata','checksv']));
    }

    public function confirmationverifylogbook(Request $request, $id)
    {
        $result = new LogbookModel();
        $data = $request;
        $dataid = $id;
        $result->PUTmethodlecture($data,$dataid);

        return redirect('indexlogbooklecture');
    }

}
