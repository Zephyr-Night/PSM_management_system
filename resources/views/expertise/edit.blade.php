@extends('layouts.app')

@section('content')

@include('layouts.adminsidebar')
<main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Expertise</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        @php
                            $no=0;   
                        @endphp
                        
                        @foreach ($lectureExpertise as $expertise)
                            <form method="post" action="{{ route('expertise.update', $expertise->expertiseID) }}" onsubmit="return confirm('Are you sure want to update this expertise?');">    
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group row">
                                    <label for="expertiseName" class="col-sm-2 col-form-label">{{++$no}}. Expertise Name: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="expertiseName" name="expertiseName" value="{{$expertise->expertiseName}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="submit" name="submit" value="Update Expertise" class="btn btn-success" style="width:133px">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        @switch($expertise->expertiseLevel)
                                            @case('Very High')
                                                <select class="form-control" name="expertiseLevel">
                                                    <option value="Low">Low</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High">High</option>
                                                    <option value="Very High" selected>Very High</option>
                                                </select>
                                                @break
                                            @case('High')
                                                <select class="form-control" name="expertiseLevel">
                                                    <option value="Low">Low</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High" selected>High</option>
                                                    <option value="Very High">Very High</option>
                                                </select>
                                                @break
                                            @case('Medium')
                                                <select class="form-control" name="expertiseLevel">
                                                    <option value="Low">Low</option>
                                                    <option value="Medium" selected>Medium</option>
                                                    <option value="High">High</option>
                                                    <option value="Very High">Very High</option>
                                                </select>
                                                @break
                                            @case('Low')
                                                <select class="form-control" name="expertiseLevel">
                                                    <option value="Low" selected>Low</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High">High</option>
                                                    <option value="Very High">Very High</option>
                                                </select>
                                                @break
                                            @default
                                        @endswitch
                                    </div>
                                </form>
                                <div class="col-sm-2">
                                    
                                    <form action="{{ route('expertise.destroy',$expertise->expertiseID) }}" onsubmit="return confirm('Are you sure want to delete this expertise?');" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
    
                                        <input type="submit" name="submit" value="Delete Expertise" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                            <br>
                            <div  style="border-bottom: 1px solid #aaa;"></div>
                            <br>
                            
                        @endforeach
                        
                    </div>
                </div>
                <br><br>
                <div class="card">
                    <div class="card-header">Add Expertise</div>
                    <div class="card-body">
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
                            <br>
                            <input type="submit" name="submit" value="Add Expertise" class="btn btn-success">
                        </form>
                    </div>
            </div>
                        
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
