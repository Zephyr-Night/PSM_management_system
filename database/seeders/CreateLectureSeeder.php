<?php

namespace Database\Seeders;

use App\Models\lectureprofileModel;
use App\Models\profileModel;
use Illuminate\Database\Seeder;

class CreateLectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecture = [
            [
               'lectureName'=>'Amir',
               'lecturePhone'=>'011-12345678',
               'lecture_Skill'=>'programming',
               'skill_Level'=> 'Advance',
               'user_id' => '3',
            ],
            [
                'lectureName'=>'Marie',
                'lecturePhone'=>'012-12345678',
                'lecture_Skill'=>'AI',
                'skill_Level'=> 'Advance',
                'user_id' => '4',
            ],
            [
                'lectureName'=>'Biden',
                'lecturePhone'=>'013-12345678',
                'lecture_Skill'=>'Report',
                'skill_Level'=> 'Intermediate',
                'user_id' => '5',
            ],
            [
                'lectureName'=>'Gwen',
                'lecturePhone'=>'014-12345678',
                'lecture_Skill'=>'AI',
                'skill_Level'=> 'Beginer',
                'user_id' => '6',
            ],

        ];

        foreach ($lecture as $key => $value) {
            lectureprofileModel::create($value);

        }
    }
}