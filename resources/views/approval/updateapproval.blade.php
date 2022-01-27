@extends('layouts.app')

@section('content')

@include('layouts.adminsidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">update request</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{Auth::user()->userID}} --}}
                       <button type="button" onclick="window.location='{{route('Approval.index')}}'" class="btn btn-primary">Back</button>
                       <br><br>
                        <form method="post" action="{{ route('Approval.update', $getvalueform->approvalID) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">

                            <label for="project_description" class="form-label">Name:</label>
                            <label >{{$getvalueform->fkStudent->studentName}}</label><br>

                            <label for="project_description" class="form-label">Matric ID:</label>
                            <label >{{$findMatricId->userID}}</label><br>

                            <label for="project_description" class="form-label">Lecture Name:</label>
                            <label >{{$getvalueform->fkLecture->lectureName}}</label><br>


                            <label for="project_description" class="form-label">Project title:</label>
                            <label >{{$getvalueform->fkproposal->project_title}}</label><br>

                            <label for="project_description" class="form-label">Objective:</label>
                            <label >{{$getvalueform->fkproposal->objective}}</label><br>

                            <label for="project_description" class="form-label">Project Scope:</label>
                            <label >{{$getvalueform->fkproposal->project_scope}}</label><br>

                            <label for="project_description" class="form-label">Problem Background:</label>
                            <label >{{$getvalueform->fkproposal->problem_background}}</label><br>

                            <label for="project_description" class="form-label">Software:</label>
                            <label >{{$getvalueform->fkproposal->software}}</label><br>

                            <label for="project_description" class="form-label">Tool:</label>
                            <label >{{$getvalueform->fkproposal->tools}}</label><br>

                            <label for="project_description" class="form-label">Project Domain:</label>
                            <label >{{$getvalueform->fkproposal->project_domain}}</label><br>





                            <label for="status">Proposal Status:</label>
                            @switch($getvalueform->status)
                                @case('Accepted')
                                    <select class="form-control" name="status" >
                                        <option value="Accepted" selected>Accepted</option>
                                        <option value="Rejected">Rejected</option>
                                    </select><br/>
                                @break
                                 @case('Rejected')
                                    <select class="form-control" name="status" >
                                        <option value="Accepted">Accepted</option>
                                        <option value="Rejected" selected>Rejected</option>
                                    </select><br/>
                                 @break
                            @default
                            @endswitch
                            <label for="reasons" class="form-label">Reason:</label>
                            <input type="text" name="reasons" id="reasons" class="form-control" value="{{$getvalueform->reasons}}"><br/>

                            <input type="submit" name="submit" value="Submit Request" class="btn btn-success">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
