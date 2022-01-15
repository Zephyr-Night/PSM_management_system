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

                        <div class="d-flex justify-content-between">
                            <button type="button" onclick="window.location='{{route('title.create')}}'" class="btn btn-primary">Add title</button>
                        </div>


                        <br><br>
                        <table class="table" id="tableId">
                            <tr>
                                <th>No</th>
                                <th>Field</th>
                                <th>Title</th>
                                <th colspan="2" style="text-align: center; ">Action</th>

                            </tr>
                            @foreach ($titlelist as $titlelist1)
                            <tr>
                                <td>letak no</td>
                                <td>{{$titlelist1->field}}</td>
                                <td>{{$titlelist1->project_title}}</td>
                                <td>
                                    <button type="button" onclick="window.location='{{route('title.edit',$titlelist1->id)}}'" class="btn btn-primary">Edit</button>

                                    <br><br>
                                {{-- </td>
                                <td> --}}
                                    <form action="{{ route('title.destroy',$titlelist1->id) }}" onsubmit="return confirm('Are you sure you want to cancel this request?');" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">

                                    <input type="submit" value="Delete" class="btn btn-danger">
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
