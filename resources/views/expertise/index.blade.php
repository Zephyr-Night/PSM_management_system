@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/counting.css">
@include('layouts.adminsidebar')
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



                        <br><br>
                        <table class="table" id="tableId">
                            <tr>
                                <th>ID</th>
                                <th>Lecture Name</th>

                            </tr>
                            @foreach ($listlecture as $listlecture)
                            <tr>
                                <td>{{$listlecture->userID}}</td>
                                <td><a href="{{route('expertise.show', $listlecture->lectureId)}}">{{$listlecture->lectureName}}</a></td>
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
