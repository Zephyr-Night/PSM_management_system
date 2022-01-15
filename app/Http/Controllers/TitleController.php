<?php

namespace App\Http\Controllers;
use App\Models\TitleModel;
use Illuminate\Http\Request;

class TitleController extends Controller
{

    public function index()
    {
        $result = new TitleModel();

        $titlelist = $result->indextitle();

       return view('title.indextitle',compact(['titlelist']));
    }


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


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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


    public function destroy($id)
    {
        $result = new TitleModel();

        $data = $id;

        $result->deleteTitle($data);


        return redirect('title');
    }

    public function listtitlestudent()
    {
        $result = new TitleModel();

        $titlelist = $result->indextitle();

       return view('title.indextitle',compact(['titlelist']));
    }

}
