<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalModel extends Model
{
    use HasFactory;

    protected $table = '_approval';
    protected $primaryKey = 'approvalID';
    protected $fillable= [
       'status',
        'reasons',
        'proposalID',
        'studentId',
    ];

    protected $guarded = [ 'lectureId',];
    public $timestamps = false;

    public function fkproposal()
    {
        return $this->belongsTo('App\Models\ProposalModel','proposalID', 'proposalID');
    }

    public function fkStudent()
    {
        return $this->belongsTo('App\Models\studentprofileModel','studentId','studentId');
    }

    public function fkLecture()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }

    //display approval status
    public function indexapprovalstatus()
    {
        //get user PK
        $getsession = session()->get('userprimarykey');
        //create new model instance
        $user = new lectureprofileModel();

        //find a specific lecture details by using where(user_id == users (table) primary key)
        $user = $user::where('user_id',$getsession)->firstOrFail();

        //display list of student who sent a proposal for one lecture
        $titlelist = ProposalModel::Select()->where('lectureId',$user->lectureId)->with('studentprofile')->get();

        return $titlelist;
    }


    public function checkforeignkey()
    {
        $checkdataapproval = ApprovalModel::get(); //get all approval data
        return $checkdataapproval;
    }


    public function showspecificproposaldata($data)
    {
        $updatetitle = ProposalModel::where('proposalID',$data)->first();

        return $updatetitle;
    }

    public function findmatricId($data)
    {
        $updatetitle = User::findOrFail($data);

        return $updatetitle;
    }

    //store
    public function store($data)
    {
        $getsession = session()->get('userprimarykey');

        $user = new lectureprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $datastore = $data->all();

        $object = new ApprovalModel($datastore,['studentId'=> $data->studentId, 'prososalID'=> $data->prososalID],);

        $user->Approval()->save($object);

    }
    public function getdataform($data)
    {
        $updatetitle = ApprovalModel::where('approvalID',$data)->first();
        return $updatetitle;
    }

    public function updateoperation($data, $dataid)
    {
        $postupdate = ApprovalModel::where('approvalID',$dataid)->first();
        $postupdate->update($data->all());
    }

    public function viewstatus($id)
    {
        $postupdate = ApprovalModel::where('proposalID',$id)->first();
        return $postupdate;
    }
    public function pendingstatus($id)
    {
        $postupdate = ProposalModel::where('proposalID',$id)->first();
        return $postupdate;
    }


}
