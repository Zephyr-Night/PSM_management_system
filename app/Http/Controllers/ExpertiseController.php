<?php

namespace App\Http\Controllers;

use App\Models\ExpertiseModel;
use Illuminate\Http\Request;
use App\Models\studentprofileModel;
use Illuminate\Contracts\Session\Session;
use App\Models\lectureprofileModel;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $result = new ExpertiseModel();

        $lectureExpertise = $result->indexLecture();
        return view('expertise.edit', compact(['lectureExpertise']));
    }

    public function listLecture(){
        $result = new ExpertiseModel();

        $listlecture = $result->listlecture();

       return view('expertise.index',compact(['listlecture']));
    }


    public function view($id){
        $result = new ExpertiseModel();
        
        $lectureExpertise = $result->indexView($id);
        
        return view('expertise.viewStudent', compact(['lectureExpertise']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expertise.edit');
    }

    public function store(Request $request)
    {
        //retrive user Primary Key data by using session (get from LoginController)
        $getsession = $request->session()->get('userprimarykey');

        $user = new lectureprofileModel();

        //find the first user_id data (foreign key) in db (table: studentprofile)
        $user = $user::where('user_id',$getsession)->firstOrFail();

        //retieve all input data
        $expertiseData = $request->all();

        //create object of class model expertise
        $addExpertise = new ExpertiseModel($expertiseData);

        $user->expertiseFK()->save($addExpertise);

        return redirect('expertise');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpertiseModel  $expertiseModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = new ExpertiseModel();
        $info = new ExpertiseModel();

        $lectureExpertise = $result->indexView($id);

        $lectureInfo = $info-> lectureInfo($id);

        return view('expertise.viewLecture', compact(['lectureExpertise', 'lectureInfo']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpertiseModel  $expertiseModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpertiseModel $expertiseModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpertiseModel  $expertiseModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = new ExpertiseModel();
        $data = $request;
        $dataid = $id;

        $result->updateExpertise($data,$dataid);

        return redirect('expertise');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpertiseModel  $expertiseModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($expertiseID)
    {
        $result = new ExpertiseModel();

        $data = $expertiseID;

        $result->deleteExpertise($data);


        return redirect('expertise');
    }
}
