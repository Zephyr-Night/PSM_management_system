@extends('layouts.app')

@section('content')

@include('layouts.adminsidebar')
<main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lecture Info</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        @foreach ($lectureExpertise as $info)
                            @csrf
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="lectureName" class="col-sm-2 col-form-label"> Name: </label>
                                    <label for="lectureName" class="col-sm-4 col-form-label">{{$info->lectureName}}</label>

                                    <label for="lectureID" class="col-sm-2 col-form-label"> ID: </label>
                                    <label for="lectureId" class="col-sm-4 col-form-label">{{$info->userID}}</label>

                                </div>

                                <div class="form-group row">
                                    <label for="lectureName" class="col-sm-2 col-form-label"> Email: </label>
                                    <label for="lectureName" class="col-sm-4 col-form-label">{{$info->email}}</label>

                                    <label for="lectureID" class="col-sm-2 col-form-label"> Phone: </label>
                                    <label for="lectureId" class="col-sm-4 col-form-label">{{$info->lecturePhone}}</label>

                                </div>

                                <div class="form-group row">
                                    <label for="lectureName" class="col-sm-2 col-form-label"> Skill: </label>
                                    <label for="lectureName" class="col-sm-4 col-form-label">{{$info->lecture_Skill}}</label>

                                    <label for="lectureID" class="col-sm-2 col-form-label"> Skill Level: </label>
                                    <label for="lectureId" class="col-sm-4 col-form-label">{{$info->skill_Level}}</label>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">View Expertise</div>
                    <div class="card-body">
                        @foreach ($lectureExpertise as $expertise)
                            @csrf
                            <p class="h4">{{$expertise->expertiseName}}</label>
                            <br>
                            <div>
                            @switch($expertise->expertiseLevel)
                                @case('Very High')
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Very High</div>
                                    </div>
                                    @break
                                @case('High')
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">High</div>
                                    </div>
                                    @break
                                @case('Medium')
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Medium</div>
                                    </div>
                                    @break
                                @case('Low')
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Low</div>
                                    </div>
                                    @break
                                @default
                            @endswitch
                            <button type="button" id="lectureId" name='lectureId' onclick="window.location='{{route('addProposal',$expertise->lectureId)}}'" class="btn btn-primary">Select</button>
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
