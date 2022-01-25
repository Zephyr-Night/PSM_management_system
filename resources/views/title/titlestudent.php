@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">PSM Title List</div>
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
                                <th>No</th>
                                <th>Field</th>
                                <th>Title</th>
                                <th>Lecture Name</th>
                                <th colspan="2" style="text-align: center; ">Action</th>

                            </tr>
                            @foreach ($avalabletitle as $titlelist1)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{$titlelist1->field}}</td>
                                <td>{{$titlelist1->project_title}}</td>
                                <td>{{$titlelist1->lectureprofile->lectureName}}</td>
                                <td>
                                    <button type="button" onclick="window.location='{{route('title.show',$titlelist1->id)}}'" class="btn btn-info">view</button>

                                    <br><br>

                                <td>
                                    <form action="{{ route('Book',$titlelist1->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">

                                    <input type="submit" value="Book" class="btn btn-success" name="Book">

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
