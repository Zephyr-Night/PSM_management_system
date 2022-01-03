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
    public function index()
    {
        //
        // $getsession = session()->get('userprimarykey');

        // $isLecture = DB::table('user')->where('userID',$getsession)->value('islecture');

        // switch($isLecture){
        //     case 0:
        //         $user = new studentprofileModel();
        //         $user = $user::where('user_id',$getsession)->firstOrFail();
        //         //
        //         break;
        //     case 1:
        //         $user = new lectureprofileModel();
        //         $user = $user::where('user_id',$getsession)->firstOrFail();
        //         //
        //         break;
        // }
        $lectureID = 1;
        $lectureExpertise = DB::table('expertise')->join('lectureprofile', 'expertise.lectureId', '=','lectureprofile.lectureId')->where('expertise.lectureId', $lectureID)->select('expertise.*','lectureprofile.*')->get();
        return view('expertise.index', compact(['lectureExpertise']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  return "sfsfsf";
        return view('expertise.edit');
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
    public function show(ExpertiseModel $expertiseModel)
    {
        //
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
    public function update(Request $request, ExpertiseModel $expertiseModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpertiseModel  $expertiseModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($expertiseID)
    {
        // $delete = ExpertiseModel::findorFail($id);
        // $delete->delete();

        return redirect('expertise');
    }
}
