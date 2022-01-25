<!-- The sidebar -->
<div class="sidebar">
    <a class="active" href="{{url('/lecturedashboard')}}">Home</a>
    <a href="{{route('LectureProfile.edit',Auth::user()->id  )}}">Profile</a>
    <a href="{{route('listRequestLecture')}}">inventory usage</a>
    <a href="{{route('expertise.create')}}">expertise add</a>
</div>
