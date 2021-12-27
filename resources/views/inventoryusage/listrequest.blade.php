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
                        {{-- {{Auth::user()->userID}} --}}

                        {{-- <button type="button" onclick="window.location='{{route('inventory.create')}}'" class="btn btn-primary">Add request</button> --}}
                        <br><br>
                        <table class="table">
                            <tr>
                                <th>Student</th>
                                <th>inventory name</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>reason</th>
                                <th colspan="2" style="text-align:center">status</th>
                            </tr>
                            @foreach ($listAll as $inventoryindex)
                            <tr>
                                <td>{{$inventoryindex->studentprofile->studentName}}</td>
                                <td>{{$inventoryindex->inventoryitem->inventoryname}}</td>
                                <td>{{$inventoryindex->Startdate}}</td>
                                <td>{{$inventoryindex->Enddate}}</td>
                                <td>{{$inventoryindex->reason}}</td>
                                <td>
                                    <form action="{{ route('inventory.update',$inventoryindex->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">

                                    <input type="submit" value="Approve Request" class="btn btn-success" name="submitbutton">
                                    <BR>

                                    <input type="submit" value="Reject Request" class="btn btn-danger" name="submitbutton" onsubmit="return confirm('Are you sure you want to cancel this request?');">
                                    </form>
                                </td>

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
