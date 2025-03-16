@extends('subfront.layout.layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
	<!-- row -->


    <video style="width: 95%; height: auto;" controls autoplay allowfullscreen>
        <source src="{{ asset('subfront/video/v.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
      </video>


</div>
@endsection
