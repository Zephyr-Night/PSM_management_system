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
               'lectureId'=>'1',
               'expertiseName' => 'Database',
               'expertiseLevel' => 'High'
            ],
            [
                'lectureId'=>'1',
                'expertiseName' => 'Software Requirement: Computer Software',
                'expertiseLevel' => 'High'
             ],
             [
                'lectureId'=>'2',
                'expertiseName' => 'Mobile Application Development',
                'expertiseLevel' => 'High'
             ],
             [
                'lectureId'=>'3',
                'expertiseName' => 'Cloud Computing',
                'expertiseLevel' => 'Very High'
             ],
             [
                'lectureId'=>'3',
                'expertiseName' => 'Mobile Application Development',
                'expertiseLevel' => 'Medium'
             ],
             [
                'lectureId'=>'3',
                'expertiseName' => 'Artificial Inteligence',
                'expertiseLevel' => 'Low'
             ],
             [
                'lectureId'=>'4',
                'expertiseName' => 'Multimedia',
                'expertiseLevel' => 'High'
             ],
        ];


        foreach ($expertise as $key => $value) {
            ExpertiseModel::create($value);

        }
    }
}
