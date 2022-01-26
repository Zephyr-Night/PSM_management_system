<?php

namespace App\Http\Controllers;
use App\Models\ApprovalModel;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{

    //display approval status
    public function index()
    {
        $result = new  ApprovalModel();
        $listproposal = $result->indexapprovalstatus();
        $getforeignkey= $result->checkforeignkey($listproposal);

        // foreach($getforeignkey as $aaa)
        // {
        //     print($aaa );
        // }

         return view('approval.indexlecture',compact(['listproposal','getforeignkey']));
    }

    public function viewApproval($id)
    {
        $result = new ApprovalModel();
        $specificproposaldata = $result->showspecificproposaldata($id);
        $matricID = $specificproposaldata->studentprofile->user_id;
        $findMatricId = $result->findmatricId($matricID);

        return view('approval.addstatusapproval',compact(['specificproposaldata','findMatricId']));
    }

    public function store(Request $request)
    {

        $result = new ApprovalModel();
        $data = $request;
        $result->store($data);

        return redirect('Approval');
    }

    public function show($id)
    {
        $result = new ApprovalModel();

        $data = $id;

        $studentstatus = $result->viewstatus($data);
        $studentstatuspending = $result->pendingstatus($data);

       return view('approval.studentview',compact(['studentstatus','studentstatuspending']));
    }


    public function edit($id)
    {
        $result = new ApprovalModel();
        $getvalueform = $result->getdataform($id);
        $matricID = $getvalueform->fkStudent->user_id;
        $findMatricId = $result->findmatricId($matricID);

        return view('approval.updateapproval',compact(['getvalueform','findMatricId']));
    }


    public function update(Request $request, $id)
    {
        $result = new ApprovalModel();
        $data = $request;
        $dataid = $id;
        $result->updateoperation($data,$dataid);

        return redirect('Approval');
    }

}
