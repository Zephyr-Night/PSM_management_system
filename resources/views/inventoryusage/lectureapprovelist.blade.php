@extends('layouts.app')

@section('content')

@include('layouts.adminsidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Inventory status</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <button type="button" onclick="window.location='{{route('listRequestLecture')}}'" class="btn btn-primary">Back</button>
                        <br><br>
                        <table class="table">
                            <tr>
                                <th>Student</th>
                                <th>inventory name</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>reason</th>

                            </tr>
                            @foreach ($listAllApprove as $inventoryindex)
                            <tr>
                                <td>{{$inventoryindex->studentprofile->studentName}}</td>
                                <td>{{$inventoryindex->inventoryitem->inventoryname}}</td>
                                <td>{{$inventoryindex->Startdate}}</td>
                                <td>{{$inventoryindex->Enddate}}</td>
                                <td>{{$inventoryindex->reason}}</td>
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

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
