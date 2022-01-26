<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isEmpty;

class LogbookModel extends Model
{
    use HasFactory;

    protected $table = 'logbook';

    protected $fillable= [
        'meetingDate',
        'startTime',
        'endTime',
        'currentProgress',
        'discDetail',
        'actPlan'
    ];

    protected $guarded = ['studentId', 'lectureId','logbookStatus'];
    public $timestamps = false;

    public function fkStudent()
    {
        return $this->belongsTo('App\Models\studentprofileModel','studentId','studentId');
    }

    public function fkLecture()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }

     //index
     public function listlogbook()
     {

        $getsession = session()->get('userprimarykey');

        $user = new studentprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $titlelist = LogbookModel::Select()->where('studentId',$user->studentId)->with('fkLecture')->get();

        return $titlelist;
     }


     //display sv data in index
     public function listlogbooktest()
     {

        $getsession = session()->get('userprimarykey');

        $user = new studentprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $checksvforFKinsert = ApprovalModel::where('studentId',$user->studentId)->with('fkLecture')->first();

        return $checksvforFKinsert;
     }


     public function checksv()
     {

        $getsession = session()->get('userprimarykey');

        $user = new studentprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $checksv1 = ApprovalModel::Select()->where('studentId',$user->studentId)->where('status', 'LIKE', 'Accepted')->with('fkLecture')->get();

        return $checksv1;
     }

     public function checklecturedataindashboard($value)
     {

        $resultmatricID = User::where('id',$value)->get();

        return $resultmatricID;
     }



           //store
    public function store($data)
    {

        $getsession = $data->session()->get('userprimarykey');

        $user = new studentprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $addlogbookdata = $data->all();

        $checksvforFKinsert = new studentprofileModel();

        $checksvforFKinsert = ApprovalModel::where('studentId',$user->user_id)->first();

        $saveinfunctionstudent = new LogbookModel($addlogbookdata);

        $saveinfunctionstudent->logbookStatus = FALSE;

        if(!($checksvforFKinsert == null))
        {
            $saveinfunctionstudent->lectureId = $checksvforFKinsert->fkLecture->lectureId;

        }

        $user->logbook()->save($saveinfunctionstudent);
    }

    public function showspecificlogbook($data)
    {
        $updatetitle = LogbookModel::findOrFail($data);

        return $updatetitle;
    }

     public function editlogbook($data)
     {
        $updatelogbook = LogbookModel::findOrFail($data);

        return $updatelogbook;
     }

    public function PUTmethod($data, $dataid)
    {
        $postupdate = LogbookModel::whereid($dataid)->first();

        $result = new LogbookModel();
        $id = $result->listlogbooktest();

        $postupdate->lectureId = $id->fkLecture->lectureId;



        $postupdate->update($data->all());
    }

    //delete
    public function deleteLogbook($data)
    {
        $deleterequest = LogbookModel::findOrFail($data);
        $deleterequest->delete();
    }



      //index lecture dasboard
    public function logbookstudent()
    {
        $getsession = session()->get('userprimarykey');

        $user = new lectureprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $datalogbook = LogbookModel::Select()->get();

        return $datalogbook;

    }

       //index lecture dasboard
       public function checkapprovestudent()
       {
           $getsession = session()->get('userprimarykey');

           $user = new lectureprofileModel();

           $user = $user::where('user_id',$getsession)->firstOrFail();

           $approvestudent = ApprovalModel::Select()->where('lectureId',$user->lectureId)->where('status','like','Accepted')->with('fkStudent')->get();

            return $approvestudent;
       }






    public function verifylogbookmodel($data)
    {
       $updatelogbook = LogbookModel::findOrFail($data);

       return $updatelogbook;
    }

    public function PUTmethodlecture($data, $dataid)
    {
        $getsession = session()->get('userprimarykey');

        $user = new lectureprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $postupdate = LogbookModel::whereid($dataid)->first();

        if($data->submitbutton == "Verify")
        {
            $postupdate->logbookStatus = true;

            if($postupdate->lectureId == $user->lectureId)
            {
                $postupdate->save();
            }
            else
            {
                $user->logbook()->save($postupdate);
            }
        }


    }



}
