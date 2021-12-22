@extends('layouts.app')

@section('content')
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
                </div>
            </div>
        </div>
    </div>
</div>

<button type="button" onclick="window.location='{{route('inventory.create')}}'">Add.</button>
@endsection
