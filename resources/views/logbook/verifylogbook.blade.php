@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verify Logbook</div>
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

                            <label>Name:</label>
                            <label >{{$editlogbookdata->fkStudent->studentName}}</label> <br>

                            @foreach ($checksv as $getID)
                            <label>Matric Id:</label>
                            <label >{{$getID->userID}}</label> <br>
                            @endforeach


                            <label>Supervisor Name:</label>
                            <label >{{Auth::user()->profileFK->lectureName}}</label> <br>

                            <label>Meeting date:</label>
                            <label >{{$editlogbookdata->meetingDate}}</label> <br>

                            <label>Start Time:</label>
                            <label >{{$editlogbookdata->startTime}}</label> <br>

                            <label>End Time:</label>
                            <label >{{$editlogbookdata->endTime}}</label> <br>

                            <label>Current Progress:</label>
                            <label >{{$editlogbookdata->currentProgress}}</label> <br>

                            <label>Discussion Detail:</label>
                            <label >{{$editlogbookdata->discDetail}}</label> <br>

                            <label>Action Plan:</label>
                            <label >{{$editlogbookdata->actPlan}}</label> <br><br>

                            <input type="submit" value="Verify" class="btn btn-success" name="submitbutton">
                            <button style="margin:7px;" type="button" onclick="window.location='{{route('indexlogbooklecture')}}'" class="btn btn-primary">Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
