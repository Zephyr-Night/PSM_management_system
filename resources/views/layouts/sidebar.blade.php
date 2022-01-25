<!-- The sidebar -->
<div class="sidebar">
    <a class="active" href="{{url('/studentdashboard')}}">Home</a>
    <a href="{{route('StudentProfile.edit',Auth::user()->id  )}}">Profile</a>
    <a href="{{route('inventory.index')}}">inventory usage</a>
    <a href="#about">About</a>
</div>
