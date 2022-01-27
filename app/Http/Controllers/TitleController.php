<?php

namespace App\Http\Controllers;
use App\Models\TitleModel;
use Illuminate\Http\Request;

class TitleController extends Controller
{

    //display lecturer dashboard
    public function index()
    {
        $result = new TitleModel();

        $titlelist = $result->indextitle();

       return view('title.indextitle',compact(['titlelist']));
    }

    //lecturer add title
    public function create()
    {
        return view('title.addtitle');
    }

    public function store(Request $request)
    {
        $result = new TitleModel();

        $data = $request;

        $result->store($data);

        return redirect('title');
    }

    //student show specific title
    public function show($id)
    {
        $result = new TitleModel();

        $data = $id;

        $showtitlespecifc = $result->viewtitle($data);

       return view('title.showtitlespecific',compact(['showtitlespecifc']));
    }

    //lecturer edit title
    public function edit($id)
    {
        $result = new TitleModel();

        $data = $id;

        $valuetitle = $result->changetitle($data);

        return view('title.edit',compact(['valuetitle']));
    }


    public function update(Request $request, $id)
    {
        $result = new TitleModel();
        $data = $request;
        $dataid = $id;

        $result->updatetitle($data,$dataid);

        return redirect('title');
    }

    //delete title
    public function destroy($id)
    {
        $result = new TitleModel();

        $data = $id;

        $result->deleteTitle($data);


        return redirect('title');
    }

    //student display available title
    public function listtitlestudent()
    {
        $result = new TitleModel();

        $avalabletitle = $result->studenttitle();

       return view('title.titlestudent',compact(['avalabletitle']));
    }

    //student book title
    public function Book(Request $request, $id)
    {
        $result = new TitleModel();
        $data = $request;
        $dataid = $id;
        $result->Book($data,$dataid);
        return redirect('listtitle');
    }




}
