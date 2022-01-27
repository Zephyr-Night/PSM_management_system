@extends('layouts.app')

@section('content')

@include('layouts.adminsidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Title</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        <button type="button" onclick="window.location='{{route('title.index')}}'" class="btn btn-primary">Back</button>
                        <br><br>
                        <form method="post" action="{{ route('title.update',$valuetitle->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">

                            <label for="field">Select a field:</label>

                            <select class="form-control" name="field">
                                <option value="BCS">BCS</option>
                                <option value="saab">BCN</option>
                                <option value="mercedes">BCG</option>
                                <option value="audi">DCS</option>
                            </select><br/>

                            <label for="project_title" class="form-label">Project Title:</label>
                            <input type="text" name="project_title" id="project_title" class="form-control" value="{{$valuetitle->project_title}}"><br/>

                            <label for="project_description" class="form-label">Project Description:</label>
                            <input type="text" name="project_description" id="project_description" class="form-control" value="{{$valuetitle->project_description}}"><br/>

                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
