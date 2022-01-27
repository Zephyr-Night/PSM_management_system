@extends('layouts.app')

@section('content')

@include('layouts.adminsidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Approval status</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <br><br>
                        <table class="table" id="tableId">
                            <tr>
                                <th>No</th>
                                <th>Student Name</th>
                                <th>Student Proposal</th>

                            </tr>

                            @foreach ($listproposal as $dataproposal)  {{-- use foreach to get a proposal data --}}
                                @foreach ($getforeignkey as $data) {{-- use foreach to get a approval data --}}
                                        @if($data->proposalID == $dataproposal->proposalID) {{-- check if data in approval(proposalID) is same with proposal(proposalID) --}}
                                        <tr>
                                            <td scope="row">{{$loop->iteration}}</td>
                                            <td>{{$dataproposal->studentprofile->studentName}}</td>
                                            <td>  <button type="button" onclick="window.location='{{route('Approval.edit',$data->approvalID)}}'" class="btn btn-primary">Edit</button></td>
                                        </tr>
                                        @endif
                                @endforeach
                                @if ($getforeignkey->contains('proposalID', $dataproposal->proposalID)== false) {{-- check if data in proposal(proposalID) is not in proposal table --}}
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$dataproposal->studentprofile->studentName}}</td>
                                     <td><button type="button" onclick="window.location='{{route('viewApproval',$dataproposal->proposalID)}}'" class="btn btn-primary">Add</button></td>
                                    </tr>
                                @endif
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
