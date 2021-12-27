@extends('layouts.app')

@section('content')
@foreach ($lectureExpertise as $expertise)
    <tr>
        <td>{{$expertise->lectureId}}</td>
        <td>{{$expertise->expertiseName}}</td>
        <td>{{$expertise->lecturePhone}}</td>
        <td>{{$expertise->lecture_Skill}}</td>
        <td >{{$expertise->expertiseLevel}}</td>
        <td>
            
        </td>
    </tr>

@include('layouts.sidebar')
@endforeach
@endsection