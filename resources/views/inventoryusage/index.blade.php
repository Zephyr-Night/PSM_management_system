@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Request Inventory</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        <br><br>
                        <button type="button" onclick="window.location='{{route('inventory.create')}}'" class="btn btn-primary">Add request</button>

                        <table class="table">
                            <tr>
                                <th>inventory name</th>
                                <th>start date</th>
                                <th>end date</th>
                                <th>reason</th>
                                <th>status</th>
                            </tr>
                            @foreach ($inventorylist as $inventoryindex)
                            <tr>
                                <td>{{$inventoryindex->inventoryitem->inventoryname}}</td>
                                <td>{{$inventoryindex->Startdate}}</td>
                                <td>{{$inventoryindex->Enddate}}</td>
                                <td>{{$inventoryindex->reason}}</td>
                                <td >{{$inventoryindex->status}}</td>
                                <td>
                                    <form action="{{ route('inventory.destroy',$inventoryindex->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">

                                    <input type="submit" value="Cancel Request" class="btn btn-danger">
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
