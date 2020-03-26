@extends('layouts/app');
@section('content');
<div class="container">
	<h2 class="text">All Courses List</h2>
	<div class="btn-group" role="group">
		<a href="{{ url("course/add") }}"><button type="button" class="btn btn-success">Insert</button></a>
		<a href="#"><button type="button" class="btn btn-info">Check</button></a>
	</div>
	<hr>
	{{ $courses->links()}}
	@if(session ('courseMSG'))
	<div class="panel panel-success">
		<div class="panel-heading">
			{{ session('courseMSG')->course_name }} was successfully inserted!
		</div>
	</div>
	@endif
	@if(session('CourseDel'))
	<div class="panel panel-danger">
		<div class="panel-heading">
			{{ session('CourseDel')->course_name }} was successfully deleted!
		</div>
	</div>
	@endif
	@if(session('update'))
		<div class=" panel panel-success">
			<div class="panel-heading">
				{{ session('update')->course_name }} was sucessfully Updated!
			</div>
		</div>
	@endif
	@foreach($courses as $course)
	<div class="panel panel-info">
			<div class="panel-heading">
			<a href="{{ url("course/detail/$course->id")}}">
				Course Name: <b style="color:green">{{ $course->course_name }}</b><br>
				ID : <b style="color:blue;">{{ $course->id }}</b>
			</a>
				<div class="pull-right">
					<a href="{{ url("course/delete/$course->id")}}"style="color:red;">
						<i class="fas fa-trash-alt"></i>
					</a>
					<a href="{{ url("course/edit/$course->id")}}" style="color:blue;">
						<i class="fas fa-edit"></i>
					</a>
				</div>
			</div>
			<div class="panel-footer">
				Created at: <b style="color:lime">{{ $course->created_at->diffForHumans() }}</b>
				Updated at: <b style="color:lime">{{ $course->updated_at->diffForHumans() }}</b>
			</div>
	</div>
	@endforeach
</div>
@endsection