<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventoryUsage extends Model
{
    use HasFactory;
    protected $table = 'inventoryusage';
    protected $fillable= [
        'itemId',
        'Startdate',
        'Enddate',
        'reason',
        'status',
    ];
    public $timestamps = false;

    //intentoryitem (itemid) is belong to model inventoryitemmodel
    public function inventoryitem()
    {
        return $this->belongsTo('App\Models\inventoryitemModel','itemId','itemId');
    }
}
