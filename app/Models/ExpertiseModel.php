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

    public function expertiseFK()
    {
        return $this->hasOne(lectureprofileModel::Class,'itemId','itemId');
    }
}
