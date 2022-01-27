@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
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
                        {{-- {{Auth::user()->userID}} --}}

                        <div class="d-flex justify-content-between">
                            <button type="button" onclick="window.location='{{route('logbook.create')}}'" class="btn btn-primary">Generate Logbook</button>
                        </div>


                        <br><br>
                        <table class="table" id="tableId">
                            <tr>
                                <th>No</th>
                                <th>Supervisor Name</th>
                                <th>Student Name</th>
                                <th>Meeting Date</th>
                                <th colspan="2" style="text-align: left; ">Action</th>

                            </tr>
                            @foreach ($listlogbookstudent as $logbooklist)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{Auth::user()->userID}}</td>


                                @if($approve == null)
                                   <td></td>
                                @else
                                <td>{{$approve->fkLecture->lectureName}}</td>
                                @endif



                                <td>{{$logbooklist->meetingDate}}</td>

                                @if($approve == null)
                                 <td></td>
                                @else
                                <td>
                                    <button type="button" onclick="window.location='{{route('logbook.show',$logbooklist->id)}}'" class="btn btn-primary">View</button>
                                    <button type="button" onclick="window.location='{{route('logbook.edit',$logbooklist->id)}}'" class="btn btn-info">Edit</button>
                                </td>
                                @endif


                            </tr>

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