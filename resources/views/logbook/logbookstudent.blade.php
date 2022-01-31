@extends('layouts.app')

@section('content')

@include('layouts.adminsidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Logbook</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->id}} --}}

                        <br><br>
                        <table class="table" id="tableId">
                            <tr>
                                <th>No</th>
                                <th>Supervisor Name</th>
                                <th>Student Name</th>
                                <th>Meeting Date</th>
                                <th colspan="2" style="text-align: center; ">Action</th>
                            </tr>

                            @foreach ($listlogbooklecture as $logbooklist)
                                {{-- check approve table is empty --}}
                                   @if (empty($checkapprovestudent))

                                   @else
<<<<<<< HEAD
                                                @if ($logbooklist->lectureId == null)
                                                        <tr>
                                                            <td scope="row">{{$loop->iteration}}</td>
                                                            <td>{{Auth::user()->profileFK->lectureName}}</td>
                                                            <td>{{$logbooklist->fkStudent->studentName}}</td>
                                                            <td>{{$logbooklist->meetingDate}}</td>

                                                            @if($logbooklist->verify == true)
                                                            <td></td>
                                                            @else
                                                            <td>
                                                                <button type="button" onclick="window.location='{{route('verifylogbook',$logbooklist->id)}}'" class="btn btn-info">view</button>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                @elseif ($logbooklist->lectureId = Auth::user()->profileFK->lectureId)
                                                <tr>
                                                    <td scope="row">{{$loop->iteration}}</td>
                                                    <td>{{Auth::user()->profileFK->lectureName}}</td>
                                                    <td>{{$logbooklist->fkStudent->studentName}}</td>
                                                    <td>{{$logbooklist->meetingDate}}</td>
                                                </tr>
                                            @endif
                                   @endif
=======
                                        @if ($logbooklist->lectureId == null)
                                            <tr>
                                                <td scope="row">{{$loop->iteration}}</td>
                                                <td>{{Auth::user()->profileFK->lectureName}}</td>
                                                <td>{{$logbooklist->fkStudent->studentName}}</td>
                                                <td>{{$logbooklist->meetingDate}}</td>
                                                
                                                @if($logbooklist->verify == true)
                                                <td></td>
                                                @else
                                                <td>
                                                    <button type="button" onclick="window.location='{{route('verifylogbook',$logbooklist->id)}}'" class="btn btn-info">view</button>
                                                </td>
                                                @endif
                                            </tr>

                                    @elseif ($logbooklist->lectureId = Auth::user()->profileFK->lectureId)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{Auth::user()->profileFK->lectureName}}</td>
                                        <td>{{$logbooklist->fkStudent->studentName}}</td>
                                        <td>{{$logbooklist->meetingDate}}</td>
                                    </tr>
                                    @endif
                                        @endif
>>>>>>> 2576342c01f597249be9bc656753477c84cf38ad
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
