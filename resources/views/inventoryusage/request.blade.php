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
                        <form method="post" action="{{ route('inventory.store') }}">
                            @csrf
                            <label for="itemId">Select a inventory:</label>
                            <select class="form-control" name="itemId">
                                @foreach($inventoryItem as $item)
                                <option value="{{$item->itemId}}">{{$item->inventoryname}}</option>
                                @endforeach
                            </select><br/>

                            <label for="Startdate" class="form-label">Start date:</label>
                            <input type="date" name="Startdate" id="Startdate" class="form-control"><br/>

                            <label for="Enddate" class="form-label">End date:</label>
                            <input type="date" name="Enddate" id="Enddate" class="form-control"><br/>

                            <label for="reason" class="form-label">Reason:</label>
                            <input type="text" name="reason" id="reason" class="form-control"><br/>

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
