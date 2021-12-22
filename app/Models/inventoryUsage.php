<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventoryUsage extends Model
{
    use HasFactory;
    protected $fillable= [
        'itemId',
        'Startdate',
        'Enddate',
        'reason',
        'status',
    ];
    public $timestamps = false;

}
