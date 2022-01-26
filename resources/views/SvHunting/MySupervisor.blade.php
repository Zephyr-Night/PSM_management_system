@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/counting.css">
@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Supervision Details</div>
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
                                <th>Supervisor</th>
                                <th>Project Title</th>
                                <th>Status</th>
                                <th colspan="2" style="text-align: center; ">Action</th>

                            </tr>
                            @foreach ($listProposal as $proposalTitle)
                            <tr>
                                <td>{{$proposalTitle->lectureName}}</td>
                                <td>{{$proposalTitle->project_title}}</td>

                                <td><button type="button" onclick="window.location='{{ route('Approval.show',$proposalTitle->proposalID) }}'" class="btn btn-primary">View Status</button></td>
                                <td>
                                    <button type="button" onclick="window.location='{{route('ProposalView', $proposalTitle->proposalID)}}'" class="btn btn-primary">View</button>

                                    <br><br>

                                    <form action="{{ route('SvHunting.destroy',$proposalTitle->proposalID) }}" onsubmit="return confirm('Are you sure want to cancel?');" method="post">
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