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
                    
                        <label>Name:</label>
                        <label >{{$datauser->fkStudent->studentName}}</label> <br>

                        <label>Matric Id:</label>
                        <label >{{Auth::user()->userID}}</label> <br>

                        <label>Supervisor Name:</label>
                        <label >{{$approve->fkLecture->lectureName}}</label> <br>


                        <label>Meeting date:</label>
                        <label >{{$datauser->meetingDate}}</label> <br>

                        <label>Start Time:</label>
                        <label >{{$datauser->startTime}}</label> <br>

                        <label>End Time:</label>
                        <label >{{$datauser->endTime}}</label> <br>

                        <label>Current Progress:</label>
                        <label >{{$datauser->currentProgress}}</label> <br>

                        <label>Discussion Detail:</label>
                        <label >{{$datauser->discDetail}}</label> <br>

                        <label>Action Plan:</label>
                        <label >{{$datauser->actPlan}}</label> <br><br>

                        <button type="button" onclick="window.location='{{route('logbook.index')}}'" class="btn btn-primary">Back</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
