@extends('layouts.app')

@section('content')

@include('layouts.sidebar')
 <main class="py-4">  {{--create spacing --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                        you are user
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{Auth::user()->email}}
                        {{ __('You are logged in!') }}
                            <br><br>
                        <button type="button" onclick="window.location='{{route('inventory.create')}}'">Add.</button>
                        <button type="button" onclick="window.location='{{route('inventory.index')}}'">home.</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
<link rel="stylesheet" href="/css/sidebar.css">
