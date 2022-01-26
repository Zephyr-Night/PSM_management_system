@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Status</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        <button type="button" onclick="window.location='{{route('mySupervisor')}}'" class="btn btn-primary">Back</button>

                        <br><br>
                        @if ($studentstatus == null)
                           <label>Name:</label>
                           <label >{{$studentstatuspending->studentprofile->studentName}}</label> <br>

                           <label>Matric Id:</label>
                           <label >{{Auth::user()->userID}}</label> <br>

                           <label>Lecture Name:</label>
                           <label >{{$studentstatuspending->lectureprofile->lectureName}}</label> <br>

                           <label>Status:</label>
                           <label >Pending</label> <br>

                           <label>Reasons:</label>
                           <label >Waiting for Approval/Rejecting request</label> <br>

                        @elseif ($studentstatus->proposalID == $studentstatuspending->proposalID)

                            <label>Name:</label>
                            <label >{{$studentstatuspending->studentprofile->studentName}}</label> <br>

                            <label>Matric Id:</label>
                            <label >{{Auth::user()->userID}}</label> <br>

                            <label>Lecture Name:</label>
                            <label >{{$studentstatuspending->lectureprofile->lectureName}}</label> <br>

                            <label>Status:</label>
                            <label >{{$studentstatus->status}}</label> <br>

                            <label>Reasons:</label>
                            <label >{{$studentstatus->reasons}}</label> <br>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
