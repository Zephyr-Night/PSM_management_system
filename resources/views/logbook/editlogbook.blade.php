@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Logbook</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        
                        <form method="post" action="{{ route('logbook.update',$editlogbookdata->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">

                            <label for="name" class="form-label">Name:</label>
                            <label style="margin-left:2.5em">{{Auth::user()->studentprofileFK->studentName}}</label><br>

                            <label for="matricID" class="form-label">Matric ID:</label>
                            <label style="margin-left:2.5em">{{Auth::user()->userID}}</label><br>

                            @foreach ($checksv as $findsvname)
                            <label for="svName" class="form-label">Supervisor Name:</label>
                            <label >{{$findsvname->fkLecture->lectureName}}</label><br>
                            @endforeach

                            <label for="meetingDate" class="form-label">Meeting date:</label>
                            <input type="date" name="meetingDate" id="meetingDate" class="form-control" value="{{$editlogbookdata->meetingDate}}"><br/>

                            <label for="startTime" class="form-label">Start Time:</label>
                            <input type="time" name="startTime" id="startTime" class="form-control" value="{{$editlogbookdata->startTime}}"><br/>

                            <label for="endTime" class="form-label">End Time:</label>
                            <input type="time" name="endTime" id="endTime" class="form-control" value="{{$editlogbookdata->endTime}}"><br/>

                            <label for="currentProgress" class="form-label">Current progress:</label>
                            <input type="text" name="currentProgress" id="currentProgress" class="form-control" value="{{$editlogbookdata->currentProgress}}"><br/>

                            <label for="discDetail" class="form-label">Discussion Details:</label>
                            <input type="text" name="discDetail" id="discDetail" class="form-control" value="{{$editlogbookdata->discDetail}}"><br/>

                            <label for="actPlan" class="form-label">Action plan:</label>
                            <input type="text" name="actPlan" id="actPlan" class="form-control" value="{{$editlogbookdata->actPlan}}"><br/>

                            <input type="submit" name="submit" value="Update Logbook" class="btn btn-success">
                            <button style="margin:7px;" type="button" onclick="window.location='{{route('logbook.index')}}'" class="btn btn-primary">Back</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
