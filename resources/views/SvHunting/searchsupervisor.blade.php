@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Supervisor</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br><br>
                        <table class="table" id="tableId">
                            <tr>
                                <th>Supervisor Name</th>
                            </tr>
                            @foreach ($listlecture as $data)
                            <tr>
                                <td><a href="{{route('SvHuntingExpertise',$data->lectureId )}}">{{$data->lectureName}}</a></td>
                                {{-- <a href="{{ URL::route('articles.edit', $article->id) }}">Edit</a> --}}
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