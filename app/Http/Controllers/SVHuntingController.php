<?php

namespace App\Http\Controllers;

use App\Models\SVHuntingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SvHuntingController extends Controller
{
    public function index()
    {
        $result = new SVHuntingModel();

        $listlecture = $result->lectureList();

       return view('SvHunting.searchSupervisor',compact(['listlecture']));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProposal($lectureId)
    {
        $result = new SVHuntingModel();

        $studentInfo = $result->studentInfo();

        Session::put('lectureId', $lectureId);

        return view('SvHunting.addProposal',compact(['studentInfo']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = new SVHuntingModel();

        $data = $request;

        $result->store($data);

        return redirect('SvHunting');
    }

    public function mySupervisor(){
        $result = new SVHuntingModel();

        $listProposal = $result->mySupervisor();

       return view('SvHunting.MySupervisor',compact(['listProposal']));
    }

    public function view($id)
    {
        $result = new SVHuntingModel();

        $data = $id;

        $showProposal = $result->viewProposal($data);

        return view('SvHunting.view',compact(['showProposal']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = new SVHuntingModel();

        $data = $id;

        $valueProposal = $result->changeProposal($data);

        return view('SvHunting.edit',compact(['valueProposal']));
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
        $result = new SVHuntingModel();
        $data = $request;
        $dataid = $id;

        $result->updateProposal($data,$dataid);

        return redirect('MySupervisor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = new SVHuntingModel();

        $data = $id;

        $result->deleteProposal($data);


        return redirect('MySupervisor');
    }
}
