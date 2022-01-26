@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
<main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Project Proposal</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                        @foreach ($valueProposal as $valueProposal)
                            <form method="post" action="{{ route('SvHunting.update', $valueProposal->proposalID) }}">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <table class="table">
                                    <tr>
                                        <th colspan="2">Section A: Student Details</th>
                                        <th colspan="2">Section B: Project Details</th>
                                    </tr>
                                    <tr>
                                        <td><label for='studentName'>Name:  </label></td>
                                        <td>{{$valueProposal->studentName}}</td>
                                        <td><label for='project_title'>Project Title:  </label></td>
                                        <td><input type="text" name="project_title" class="form-control" value="{{$valueProposal->project_title}}"></td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td><label for='userID'>Matrix ID:  </label></td>
                                        <td>{{$valueProposal->userID}}</td>
                                        <td><label for='objective'>Objective:  </label></td>
                                        <td ><textarea id="objective" name="objective" rows="3">{{$valueProposal->objective}}</textarea></td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td></td>
                                        <td></td>
                                        <td><label for='project_scope'>Project Scope:  </label></td>
                                        <td><textarea id="project_scope" name="project_scope" rows="3">{{$valueProposal->project_scope}}</textarea></td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td></td>
                                        <td></td>
                                        <td><label for='problem_background'>Problem Background:  </label></td>
                                        <td><textarea id="problem_background" name="problem_background" rows="3">{{$valueProposal->problem_background}}</textarea></td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td></td>
                                        <td></td>
                                        <td><label for='software'>Software:  </label></td>
                                        <td><textarea id="software" name="software" rows="3">{{$valueProposal->software}}</textarea></td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td></td>
                                        <td></td>
                                        <td><label for='tools'>Tools:  </label></td>
                                        <td><textarea id="tools" name="tools" rows="3">{{$valueProposal->tools}}</textarea></td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td></td>
                                        <td></td>
                                        <td><label for='project_domain'>Project Domain:  </label></td>
                                        <td>
                                            <select class="form-control" name="project_domain">
                                                <option value="{{$valueProposal->project_domain}}" selected>Current domain: {{$valueProposal->project_domain}}</option>
                                                <option value="(CS) Computer Science">(CS) Computer Science</option>
                                                <option value="(SN) Computer Systems & Networking">(SN) Computer Systems & Networking</option>
                                                <option value="(SE) Software Engineering">(SE) Software Engineering</option>
                                                <option value="(GMM) Graphics & Multimedia">(GMM) Graphics & Multimedia</option>
                                                <option value="(CY) Cyber Security">(CY) Cyber Security</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <input type="submit" name="submit" value="Update" class="btn btn-success">
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