<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lectureprofileModel extends Model
{
    protected $table = 'lectureprofile';
    use HasFactory;

    protected $primaryKey = 'lectureId';

    protected $fillable= [
        'lectureName',
        'lecturePhone',
        'lecture_Skill',
        'skill_Level',
    ];

    protected $guard = ['user_id'];
    public $timestamps = false;


    public function inventoryusage()
    {
        return $this->hasMany('App\Models\inventoryusageModel','lectureId','lectureId');
    }

    public function expertiseFK(){
        return $this -> hasMany('App\Models\ExpertiseModel', 'lectureId', 'lectureId');
    }

    public function title()
    {
        return $this->hasMany('App\Models\TitleModel','lectureId','lectureId');
    }

    public function logbook()
    {
        return $this->hasMany('App\Models\LogbookModel','lectureId','lectureId' );
    }

    public function userid()
    {
        return $this->belongsTo('App\Models\User','id','user_id');
    }

    public function svHunting()
    {
        return $this->hasMany('App\Models\SvHuntingModel','studentId','studentId');
    }

    public function Approval()
    {
        return $this->hasMany('App\Models\ApprovalModel','lectureId','lectureId');
    }


     //index
     public function changeprofile($data)
    {
        $updateprofile = lectureprofileModel::Select()->where('user_id',$data)->get();

        return $updateprofile;
    }

    public function updatelectureprofile($data, $id)
    {
        $updateprofile = lectureprofileModel::where('lectureId',$id)->first();
        $updateprofile->update($data->all());
    }



}
