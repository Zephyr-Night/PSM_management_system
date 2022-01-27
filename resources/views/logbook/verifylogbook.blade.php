@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add request</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        
                        <form method="post" action="{{ route('confirmationverifylogbook',$editlogbookdata->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">

                            <label>Name</label>
                            <label style="margin-left:5.3em">: {{$editlogbookdata->fkStudent->studentName}}</label> <br>

                            @foreach ($checksv as $getID)
                            <label>Matric Id</label>
                            <label style="margin-left:4.0em">: {{$getID->userID}}</label> <br>
                            @endforeach

                            <label>Supervisor Name</label>
                            <label style="margin-left:0.2em">: {{Auth::user()->profileFK->lectureName}}</label> <br>

                            <label>Meeting Date</label>
                            <label style="margin-left:1.9em">: {{$editlogbookdata->meetingDate}}</label> <br>

                            <label>Start Time</label>
                            <label style="margin-left:3.3em">: {{$editlogbookdata->startTime}}</label> <br>

                            <label>End Time</label>
                            <label style="margin-left:3.8em">: {{$editlogbookdata->endTime}}</label> <br>

                            <label>Current Progress</label>
                            <label style="margin-left:0.4em">: {{$editlogbookdata->currentProgress}}</label> <br>

                            <label>Discussion Detail</label>
                            <label style="margin-left:0.3em">: {{$editlogbookdata->discDetail}}</label> <br>

                            <label>Action Plan:</label>
                            <label style="margin-left:2.7em">: {{$editlogbookdata->actPlan}}</label> <br><br>

                            <input type="submit" value="Verify" class="btn btn-success" name="submitbutton">
                            <button type="button" onclick="window.location='{{route('indexlogbooklecture')}}'" class="btn btn-primary">Back</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">