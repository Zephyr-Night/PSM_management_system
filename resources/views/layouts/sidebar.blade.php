<!-- The sidebar -->
<div class="sidebar">
    <a class="active" href="{{url('/studentdashboard')}}">Home</a>
    <a href="{{route('StudentProfile.edit',Auth::user()->id  )}}">profile</a>
    <a href="{{route('listtitle')}}">Title list</a>
    <a href="{{route('SvHunting.index')}}">search supervisor</a>
    <a href="{{route('mySupervisor')}}">My Supervisor</a>
    <a href="{{route('inventory.index')}}">inventory usage</a>
    <a href="{{route('logbook.index')}}">Logbook</a>
    <a href="#about">About</a>
</div>
