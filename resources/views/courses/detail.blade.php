@extends('layouts/app');
@section('content');
<div class="container">
	<a href="{{ url("course")}}"><button type="button" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i></button></a>
	<br><br>
	<div class="panel panel-info">
		<div class="panel-heading">
			Course Name: <b style="color:green;">{{ $course->course_name }}</b><br>
			ID : <b style="color:blue">{{ $course->id }}</b>
		</div>
		<div class="panel-footer">
			Created at: <b style="color:lime">{{ $course->created_at->diffForHumans() }}</b><br>
			Updated at: <b style="color:lime">{{ $course->updated_at->diffForHumans() }}</b>
		</div>
	</div>
</div>
@endsection