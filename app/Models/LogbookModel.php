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

    //index for the student to view the logbook list
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

        //get the approval where the user of specific id join table with fkLecture function to get the lecture data(sv data)
        $checksvforFKinsert = ApprovalModel::where('studentId',$user->studentId)->with('fkLecture')->first();

        return $checksvforFKinsert;
    }


    public function checksv()
    {
        $getsession = session()->get('userprimarykey');

        $user = new studentprofileModel();
        $user = $user::where('user_id',$getsession)->firstOrFail();
        
        //get all approval primary key for specific user (studentId)
            //->where('status','LIKE','Accepted')->
            //access data from other table by using foreign key (lectureId) using with()
            //get all the lecture that accepted the student
        $checksv1 = ApprovalModel::Select()->where('studentId',$user->studentId)->with('fkLecture')->get();

        return $checksv1;
    }

    public function checklecturedataindashboard($value)
    {

        $resultmatricID = User::where('id',$value)->get();


        return $resultmatricID;
    }



    //store the user logbook data as the student
    public function store($data)
    {
        //get user Primary Key data by using session
        $getsession = $data->session()->get('userprimarykey');
        //create new model instance
        $user = new studentprofileModel();
        //find the first user_id data (foreign key) in database table or else fail(error)
        $user = $user::where('user_id',$getsession)->firstOrFail();
        //create the logbook records using all method
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

    //display the logbook data
    public function showspecificlogbook($data)
    {
        $updatetitle = LogbookModel::findOrFail($data);
        //retrieve logbook data
        return $updatetitle;
    }

    //edit logbook data
    public function editlogbook($data)
    {
        $updatelogbook = LogbookModel::findOrFail($data);

        return $updatelogbook;
    }

    //to modify the data (update data)
    public function PUTmethod($data, $dataid)
    {
        $postupdate = LogbookModel::whereid($dataid)->first();

        $result = new LogbookModel();
        $id = $result->listlogbooktest();
        $postupdate->lectureId = $id->fkLecture->lectureId;

        //retrieve all the records using all method
        $postupdate->update($data->all());
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
        $approvestudent = ApprovalModel::where('lectureId',$user->lectureId)->where('status','like','Accepted')->with('fkStudent')->first();

        return $approvestudent;
        }

    //verify logbook data (view the logbook data of the student as a lecture)    
    public function verifylogbookmodel($data)
    {
       $updatelogbook = LogbookModel::findOrFail($data);

       return $updatelogbook;
    }

    //to modify the data (update verify)
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