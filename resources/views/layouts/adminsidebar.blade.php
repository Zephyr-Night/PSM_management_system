<!-- The sidebar -->
<div class="sidebar">
    <a class="active" href="{{url('/lecturedashboard')}}">Home</a>
    <a href="{{route('LectureProfile.edit',Auth::user()->id  )}}">profile</a>
    <a href="{{route('title.index')}}">title index</a>
    <a href="{{route('listRequestLecture')}}">inventory usage</a>
    <a href="{{route('ListLectureExpertise')}}">Expertise view</a>
    <a href="{{route('expertise.index')}}">Expertise Edit/Add</a>
    <a href="{{route('Approval.index')}}">approval list</a>
    <a href="{{route('indexlogbooklecture')}}">Logbook</a>

</div>
