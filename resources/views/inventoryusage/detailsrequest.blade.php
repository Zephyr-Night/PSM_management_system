@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Request information</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <button type="button" onclick="window.location='{{route('inventory.index')}}'" class="btn btn-primary">Back</button>
                            <br><br>

                            <table class="table table-borderless">

                            <tr>
                                <td>Inventory Name:</td>
                                <td>{{$detailinventory->inventoryitem->inventoryname}}</td>
                            </tr>
                            <tr>
                                <td>Start Date:</td>
                                <td>{{$detailinventory->Startdate}}</td>
                            </tr>
                            <tr>
                                <td>End Date:</td>
                                <td>{{$detailinventory->Enddate}}</td>
                            </tr>
                            <tr>
                                <td>Reason:</td>
                                <td>{{$detailinventory->reason}}</td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td>{{$detailinventory->status}}</td>
                            </tr>
                            @if ($detailinventory->status =="pending")
                            <tr>
                                <td>Lecture Name:</td>
                                <td>-</td>
                            </tr>
                            @else
                            <tr>
                                <td>Lecture Name:</td>
                                <td>{{$detailinventory->lectureprofile->lectureName}}</td>
                            </tr>
                            @endif
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
