<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExpertiseModel extends Model
{
    use HasFactory;
    protected $table = 'expertise';
    protected $primaryKey = 'expertiseID';
    protected $fillable= [
        'lectureId',
        'expertiseName',
        'expertiseLevel'
    ];


    public $timestamps = false;

    public function lectureFK()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }

    //get the user lectuere id to show the data in the edit/add page
    public function indexLecture(){
        $getsession = session()->get('userprimarykey');

        $user = new lectureprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $expertiseData = DB::table('lectureprofile')
        -> join('expertise', 'expertise.lectureId','=', 'lectureprofile.lectureId')
        -> join('users', 'users.id','=', 'lectureprofile.user_id')
        -> where('expertise.lectureId', $user->lectureId)
        -> select('expertise.*','lectureprofile.*','users.*')->get();

        return $expertiseData;
    }

    //view the expertise of the lecture selected
    public function indexView($id){
        
        $lectureExpertise = DB::table('lectureprofile')
        -> join('expertise', 'expertise.lectureId','=', 'lectureprofile.lectureId')
        -> join('users', 'users.id','=', 'lectureprofile.user_id')
        -> where('expertise.lectureId', $id)
        -> select('expertise.*','lectureprofile.*','users.*')
        -> get();

        return $lectureExpertise;
    }

    //get the lecture info to show in the view page
    public function lectureInfo($id){
        $info = DB::table('lectureprofile')
        -> join('users', 'users.id','=', 'lectureprofile.user_id')
        -> where('lectureprofile.lectureId', $id)
        -> select('lectureprofile.*','users.*')
        -> get();
        return $info;
    }

    //get all of lecture to show in the list lecture page 
    public function listlecture()
    {
        $listlecture = DB::table('lectureprofile')
        -> join('users', 'users.id','=', 'lectureprofile.user_id')
        -> select('lectureprofile.*','users.*')
        -> get();

        return $listlecture;
    }

    //get the lecture profile with dataid and update the new data to the model
    public function updateExpertise($data, $dataid){
        $postupdate = ExpertiseModel::where('expertiseID',$dataid)->first();

        $postupdate->update($data->all());
    }

    //get expertise details with id and delete the data in the database
    public function deleteExpertise($id){
        $deleterequest = ExpertiseModel::Select()->where('expertiseID',$id);
        $deleterequest->delete();
    }
}