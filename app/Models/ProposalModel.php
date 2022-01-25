<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalModel extends Model
{
    use HasFactory;
    protected $table = 'proposal';
    protected $fillable= [
        'project_title',
        'objective',
        'project_scope',
        'problem_background',
        'software',
        'tools',
        'project_domain',
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

    public function fkproposal()
    {
        return $this->hasOne('App\Models\ApprovalModel','proposalID', 'proposalID');
    }


    public function listlecture()
    {
        $listlecture = lectureprofileModel::Select()->get();

        return $listlecture;
    }

}
