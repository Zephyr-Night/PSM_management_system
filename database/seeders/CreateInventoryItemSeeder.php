<?php

namespace Database\Seeders;

use App\Models\inventoryitemModel;
use Illuminate\Database\Seeder;

class CreateInventoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $item = [
            [
               'itemId'=>'1',
               'inventoryname'=>'computer/laptop',
               'quantity'=>'5',
            ],
            [
                'itemId'=>'2',
                'inventoryname'=>'robotic (LEGO)',
                'quantity'=>'5',
            ],
            [
                'itemId'=>'3',
                'inventoryname'=>'wifi adapter',
                'quantity'=>'5',
            ],

        ];

        foreach ($item as $key => $value) {

            inventoryitemModel::create($value);

        }

    }
}
