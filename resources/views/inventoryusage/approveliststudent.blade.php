@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Request Inventory</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}

                        <button type="button" onclick="window.location='{{route('inventory.index')}}'" class="btn btn-primary">Back</button>
                        <br><br>
                        <table class="table">
                            <tr>
                                <th>inventory name</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>reason</th>
                                <th>Lecture Name</th>
                            </tr>
                            @foreach ($listAllapprove as $inventoryindex)
                            <tr>
                                <td>{{$inventoryindex->inventoryitem->inventoryname}}</td>
                                <td>{{$inventoryindex->Startdate}}</td>
                                <td>{{$inventoryindex->Enddate}}</td>
                                <td>{{$inventoryindex->reason}}</td>
                                <td>{{$inventoryindex->lectureprofile->lectureName}}</td>
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
