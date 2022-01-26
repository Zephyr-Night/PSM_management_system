<!-- The sidebar -->
<div class="sidebar">
    <a class="active" href="{{url('/lecturedashboard')}}">Home</a>
    <a href="{{route('LectureProfile.edit',Auth::user()->id  )}}">Profile</a>
    <a href="{{route('title.index')}}">Title Index</a>
    <a href="{{route('listRequestLecture')}}">Inventory Usage</a>
    <a href="{{route('ListLectureExpertise')}}">List Lecture</a>
    <a href="{{route('expertise.index')}}">Expertise Edit/Add/Delete</a>
    <a href="{{route('Approval.index')}}">Approval List</a>
    <a href="{{route('indexlogbooklecture')}}">Logbook</a>

</div>
