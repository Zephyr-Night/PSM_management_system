<?php

namespace App\Http\Controllers;

use App\Models\lectureprofileModel;
use Illuminate\Http\Request;

class LectureController extends Controller
{


    public function edit($id)//
    {
        $result = new lectureprofileModel();

        $updateprofile = $result->changeprofile($id);

        return view('lecture.edit',compact(['updateprofile']));
    }

    public function update(Request $request, $id)
    {
        $result = new lectureprofileModel();
        $data = $request;
        $dataid = $id;

        $result->updatelectureprofile($data,$dataid);

        return redirect('lecturedashboard');
    }
}
