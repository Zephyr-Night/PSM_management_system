@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Logbook</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        
                        <label>Name</label>
                        <label style="margin-left:5.3em">: {{$datauser->fkStudent->studentName}}</label> <br>

                        <label>Matric Id:</label>
                        <label style="margin-left:3.9em">: {{Auth::user()->userID}}</label> <br>

                        <label>Supervisor Name</label>
                        <label style="margin-left:0.2em">: {{$approve->fkLecture->lectureName}}</label> <br>

                        <label>Meeting Date</label>
                        <label style="margin-left:1.9em">: {{$datauser->meetingDate}}</label> <br>

                        <label>Start Time</label>
                        <label style="margin-left:3.3em">: {{$datauser->startTime}}</label> <br>

                        <label>End Time</label>
                        <label style="margin-left:3.7em">: {{$datauser->endTime}}</label> <br>

                        <label>Current Progress</label>
                        <label style="margin-left:0.4em">: {{$datauser->currentProgress}}</label> <br>

                        <label>Discussion Detail</label>
                        <label style="margin-left:0.3em">: {{$datauser->discDetail}}</label> <br>

                        <label>Action Plan</label>
                        <label style="margin-left:3.0em">: {{$datauser->actPlan}}</label> <br><br>

                        <button type="button" onclick="window.location='{{route('logbook.index')}}'" class="btn btn-primary">Back</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">