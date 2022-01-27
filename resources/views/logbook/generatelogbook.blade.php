@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Generate Logbook</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                          
                        <form method="post" action="{{ route('logbook.store') }}">
                            @csrf
                            <label for="studentName" class="form-label">Name</label>
                            <label style="margin-left:5.3em">: {{Auth::user()->studentprofileFK->studentName}}</label><br>

                            <label for="matricId" class="form-label">Matric ID</label>
                            <label style="margin-left:3.9em">: {{Auth::user()->userID}}</label><br>

                            @foreach ($checksv as $findsvname)
                            <label for="lectureName" class="form-label">Supervisor Name</label>
                            <label style="margin-left:0.2em">: {{$findsvname->fkLecture->lectureName}}</label><br>
                            @endforeach

                            <label for="meetingDate" class="form-label">Meeting Date</label>
                            <input type="date" name="meetingDate" id="meetingDate" class="form-control"><br/>

                            <label for="startTime" class="form-label">Start Time</label>
                            <input type="time" name="startTime" id="startTime" class="form-control"><br/>

                            <label for="endTime" class="form-label">End Time</label>
                            <input type="time" name="endTime" id="endTime" class="form-control"><br/>

                            <label for="currentProgress" class="form-label">Current Progress</label>
                            <input type="text" name="currentProgress" id="currentProgress" class="form-control"><br/>

                            <label for="discDetail" class="form-label">Discussion Details</label>
                            <input type="text" name="discDetail" id="discDetail" class="form-control"><br/>

                            <label for="actPlan" class="form-label">Action Plan</label>
                            <input type="text" name="actPlan" id="actPlan" class="form-control"><br/>

                            <input type="submit" name="submit" value="Create Logbook" class="btn btn-success">
                            <button type="button" onclick="window.location='{{route('logbook.index')}}'" class="btn btn-primary">Back</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">