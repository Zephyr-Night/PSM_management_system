<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertiseModel extends Model
{
    use HasFactory;
    protected $table = 'expertise';

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
}
