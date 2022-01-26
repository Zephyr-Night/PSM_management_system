@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
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
                        @foreach ($showProposal as $showProposal)
                            <form method="post" action="">
                                @csrf
                                {{-- <label for='expertiseName'>Enter Expertise Name: </label>
                                <input type="text" name="expertiseName" class="form-control"><br/>

                                <label for='expertiseLevel'>Select Expertise Level: </label>
                                <select class="form-control" name="expertiseLevel">
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                    <option value="Very High">Very High</option>
                                </select> --}}
                                <table class="table">
                                    <tr>
                                        <th colspan="2">Section A: Student Details</th>
                                        <th colspan="2">Section B: Project Details</th>
                                    </tr>
                                    <tr>
                                        <td><label for='studentName'>Name:  </label></td>
                                        <td>{{$showProposal->studentName}}</td>
                                        <td><label for='project_title'>Project Title:  </label></td>
                                        <td>{{$showProposal->project_title}}</td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td><label for='userID'>Matrix ID:  </label></td>
                                        <td>{{$showProposal->userID}}</td>
                                        <td><label for='objective'>Objective:  </label></td>
                                        <td>{{$showProposal->objective}}</td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td></td>
                                        <td></td>
                                        <td><label for='project_scope'>Project Scope:  </label></td>
                                        <td>{{$showProposal->project_scope}}</td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td></td>
                                        <td></td>
                                        <td><label for='problem_background'>Problem Background:  </label></td>
                                        <td>{{$showProposal->problem_background}}</td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td></td>
                                        <td></td>
                                        <td><label for='software'>Software:  </label></td>
                                        <td>{{$showProposal->software}}</td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td></td>
                                        <td></td>
                                        <td><label for='tools'>Tools:  </label></td>
                                        <td>{{$showProposal->tools}}</td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td></td>
                                        <td></td>
                                        <td><label for='project_domain'>Project Domain:  </label></td>
                                        <td>{{$showProposal->project_domain}}</td>
                                    </tr>
                                </table>
                                    <button type="button" onclick="window.location='{{route('SvHunting.edit',$showProposal->proposalID)}}'" class="btn btn-primary">Edit</button>
                            </form>
                        @endforeach 
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">