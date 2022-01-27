<?php

namespace App\Http\Controllers;

use App\Models\ApprovalModel;
use Illuminate\Http\Request;
use App\Models\LogbookModel;
class LogbookController extends Controller
{
    //display the list of the logbook at student dashboard
    public function index()
    {
        $result = new LogbookModel();

        $listlogbookstudent = $result->listlogbook();
        $approve = $result->listlogbooktest();

        // print($approve);

        // print($listlogbookstudent);
      return view('logbook.index',compact(['listlogbookstudent','approve']));
    }

    //create the new logbook and check the lecture(sv)
    public function create()
    {
        $result = new LogbookModel();
        $checksv = $result->checksv();

        return view('logbook.generatelogbook',compact(['checksv']));
    }

    //store the new logbook data
    public function store(Request $request)
    {
        $result = new LogbookModel();
        $data = $request;
        $result->store($data);

        return redirect('logbook');
    }

    //display the logbook details and the approved supervisor of the specific id
    public function show($id)
    {
        $result = new LogbookModel();
        $datauser = $result->showspecificlogbook($id);
        $approve = $result->listlogbooktest();

        return view('logbook.viewlogbookspecific',compact(['datauser','approve']));
    }

    //edit the logbook of the specific id
    public function edit($id)
    {
        $result = new LogbookModel();
        $data = $id;
        $editlogbookdata = $result->editlogbook($data);
        $checksv = $result->checksv();

        return view('logbook.editlogbook',compact(['editlogbookdata','checksv']));
    }

    //update the data of the specific requested id in the logbook list
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

    //display the logbook list and the check the approved supervisor in lecture dashboard
    public function indexlogbooklecture()
    {
        $result = new LogbookModel();
        $listlogbooklecture = $result->logbookstudent();
        $checkapprovestudent = $result->checkapprovestudent();
         print($listlogbooklecture);

        return view('logbook.logbookstudent',compact(['listlogbooklecture','checkapprovestudent']));
    }

    //verify the logbook of thespecific id
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

    //confirm the verification logbook
    public function confirmationverifylogbook(Request $request, $id)
    {
        $result = new LogbookModel();
        $data = $request;
        $dataid = $id;
        //update the data
        $result->PUTmethodlecture($data,$dataid);

        return redirect('indexlogbooklecture');
    }

}
