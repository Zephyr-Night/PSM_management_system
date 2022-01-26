<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDO;

class SVHuntingModel extends Model
{
    use HasFactory;
    protected $table = 'proposal';
    protected $primaryKey = 'proposalID';
    protected $fillable= [
        'project_title',
        'objective',
        'project_scope',
        'problem_background',
        'software',
        'tools',
        'project_domain'
    ];

    protected $guarded = ['studentId','lectureId'];
    public $timestamps = false;

    public function lectureprofile()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }
    public function studentprofile()
    {
        return $this->belongsTo('App\Models\studentprofileModel','studentId','studentId');
    }
    public function studentLecture()
    {
        return $data = collect([$this->lectureprofile, $this->studentprofile]);
    }
    public function lectureList()
    {
        $listLecture = DB::table('lectureprofile')
        -> join('users', 'users.id','=', 'lectureprofile.users_id')
        -> select('lectureprofile.*','users.*')
        -> get();

        return $listLecture;
    }

    public function studentInfo(){
        $getsession = session()->get('userprimarykey');

        $user = new studentprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $studentInfo = DB::table('studentprofile')
        -> join('users', 'users.id','=', 'studentprofile.user_id')
        -> where('studentprofile.studentId', $user->studentId)
        -> select('studentprofile.*','users.*')
        -> get();

        return $studentInfo;
    }
    public function store($data)
    {
        $lectureId=Session::get('lectureId');

        $getsession = $data->session()->get('userprimarykey');

        $user = new studentprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $lecture = new lectureprofileModel();

        $lecture = $lecture::where('lectureId',$lectureId)->firstOrFail();

        $addProposal = $data->all();

        $addProposalFinal = new SVHuntingModel($addProposal);

        $addProposalFinal->lectureId = $lecture->lectureId;

        $user->svHunting()->save($addProposalFinal);
    }
    public function viewProposal($id)
    {
        $getsession = session()->get('userprimarykey');

        $user = new studentprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $listProposal = DB::table('proposal')
        -> join('lectureprofile', 'lectureprofile.lectureId','=', 'proposal.lectureId')
        -> join('studentprofile', 'studentprofile.studentId','=', 'proposal.studentId')
        -> join('users', 'users.id','=', 'studentprofile.user_id')
        -> where('proposal.proposalID',$id)
        -> select('lectureprofile.*','users.*','proposal.*','studentprofile.*')
        -> get();

        return $listProposal;
    }
    public function mySupervisor()
    {
        $getsession = session()->get('userprimarykey');

        $user = new studentprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $listProposal = DB::table('proposal')
        -> join('lectureprofile', 'lectureprofile.lectureId','=', 'proposal.lectureId')
        -> join('users', 'users.id','=', 'lectureprofile.user_id')
        -> where('proposal.studentId',$user->studentId)
        -> select('lectureprofile.*','users.*','proposal.*')
        -> get();

        return $listProposal;
    }
    public function changeProposal($data)
    {
        $updateProposal = DB::table('proposal')
        -> join('lectureprofile', 'lectureprofile.lectureId','=', 'proposal.lectureId')
        -> join('studentprofile', 'studentprofile.studentId','=', 'proposal.studentId')
        -> join('users', 'users.id','=', 'studentprofile.user_id')
        -> where('proposal.proposalID',$data)
        -> select('lectureprofile.*','users.*','proposal.*','studentprofile.*')
        -> get();

        return $updateProposal;
    }
    public function updateProposal($data, $dataid)
    {
        $postupdate = SVHuntingModel::where('proposalID',$dataid)->first();

        $postupdate->update($data->all());
    }
    public function deleteProposal($data)
    {
        $deleterequest = SVHuntingModel::Select()->where('proposalID',$data);
        $deleterequest->delete();
    }
}
