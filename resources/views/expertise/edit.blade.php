@extends('layouts.app')

@section('content')

@include('layouts.adminsidebar')
<main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add request</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        <form method="post" action="{{ route('expertise.store') }}">
                            @csrf
                            <label for='expertiseName'>Enter Expertise Name: </label>
                            <input type="text" name="expertiseName" class="form-control"><br/>

                            <label for='expertiseLevel'>Select Expertise Level: </label>
                            <select class="form-control" name="expertiseLevel">
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                                <option value="Very High">Very High</option>
                            </select>

                            <input type="submit" name="submit" value="request" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
