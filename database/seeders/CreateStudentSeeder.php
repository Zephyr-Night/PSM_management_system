<?php

namespace Database\Seeders;

use App\Models\studentprofileModel;
use Illuminate\Database\Seeder;

class CreateStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $student = [
            [
               'studentName'=>'aiman',
               'user_id'=>'1',
               'studentPhone'=>'011-12768501',
               'student_Skill'=>'coding',
               'skill_Level'=> 'moderate',
            ],
            [
                'studentName'=>'hasif',
                'user_id'=>'2',
                'studentPhone'=>'012-12345678',
                'student_Skill'=>'AI',
                'skill_Level'=> 'high',
            ],
            [
                'studentName'=>'Biden',
                'studentPhone'=>'013-12345678',
                'student_Skill'=>'Report',
                'skill_Level'=> 'high',
            ],
            [
                'studentName'=>'Gwen',
                'studentPhone'=>'014-12345678',
                'student_Skill'=>'AI',
                'skill_Level'=> 'low',
            ],

        ];

        foreach ($student as $key => $value) {

            studentprofileModel::create($value);

        }
    }
}
