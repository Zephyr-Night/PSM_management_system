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
                                <th>Supervisor Name</th>
                                <th>Student Name</th>
                                <th>Meeting Date</th>
                                <th colspan="2" style="text-align: left; ">Action</th>

                            </tr>
                            @foreach ($listlogbooklecture as $logbooklist)
                                @if ($logbooklist->lectureId == Auth::user()->id)
                                    <tr>
                                        <td>{{Auth::user()->profileFK->lectureName}}</td>
                                        <td>{{$logbooklist->fkStudent->studentName}}</td>
                                        <td>{{$logbooklist->meetingDate}}</td>

                                        @if($logbooklist->logbookStatus == true)
                                        <td></td>
                                    @else
                                    <td>
                                        <button type="button" onclick="window.location='{{route('verifylogbook',$logbooklist->id)}}'" class="btn btn-info">View</button>
                                    </td>
                                    @endif
                                    </tr>
                                @else
                                    @foreach ($checkapprovestudent as $checkstudentapprovelist)
                                    @if ($checkstudentapprovelist->lectureId == Auth::user()->profileFK->lectureId)

                                        <tr>
                                            <td>{{Auth::user()->profileFK->lectureName}}</td>
                                            <td>{{$logbooklist->fkStudent->studentName}}</td>
                                            <td>{{$logbooklist->meetingDate}}</td>

                                            @if($logbooklist->logbookStatus == true)
                                            <td></td>
                                        @else
                                        <td>
                                            <button type="button" onclick="window.location='{{route('verifylogbook',$logbooklist->id)}}'" class="btn btn-info">View</button>
                                        </td>
                                        @endif
                                        </tr>
                                    @endif
                                    @endforeach
                                @endif
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
