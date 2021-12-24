<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExpertiseModel;

class ExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expertise = [
            [
               'lectureID'=>'1',
               'expertiseName' => 'example',
               'expertiseLevel' => 'High'
            ]
        ];
    

        foreach ($expertise as $key => $value) {
            ExpertiseModel::create($value);

        }
    }
}
