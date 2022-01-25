<?php

namespace App\Http\Controllers;

use App\Models\studentprofileModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function edit($id)
    {
        $result = new studentprofileModel();
        $updateprofile = $result->editstudentprofile($id);

        return view('Student.edit',compact(['updateprofile']));

    }


    public function update(Request $request, $id)
    {
        $result = new studentprofileModel();
        $data = $request;
        $dataid = $id;
        $result->updatestudentprofile($data,$dataid);

        return redirect('studentdashboard');
    }

}
