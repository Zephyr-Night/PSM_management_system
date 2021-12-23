<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventoryitemModel extends Model
{
    use HasFactory;
    protected $table = 'inventory_item';

    protected $fillable= [
        'itemId',
    ];

    protected $guard= [
    'inventoryname',
    'quantity',
    ];


    public $timestamps = false;

    public function inventoryitemFK()
    {
        return $this->hasOne('App\Models\inventoryUsage','itemId');
    }

}
