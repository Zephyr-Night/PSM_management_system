<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentprofileModel extends Model
{
    use HasFactory;

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
        return $this->hasMany('App\Models\inventoryUsage', );
    }
}
