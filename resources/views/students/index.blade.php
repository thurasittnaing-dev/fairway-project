@extends('layouts/app')
@section('content')

<div class="container">
	<h1 class="text">All Students List</h1>
	<div class="btn-group" role="group">
		<a href="{{ url("student/add") }}"><button type="button" class="btn btn-success">Insert</button></a>
		<a href="#"><button type="button" class="btn btn-info">Check</button></a>
	</div>
	<hr>
	<ul>
		{{ $students->links() }}
		@if(session('delMSG'))
		<div class="alert alert-danger">
			<h4 class="alert-heading">
				Deleted!
			</h4>
			<p><strong style="color:green">{{ session('delMSG')->student_name }}</strong> has been removed from student list.</p>
			<hr>
		</div>
		@endif
		@if(session('insertMSG'))
		<div class="alert alert-success">
			<h4 class="alert-heading">
				Insert Successful !
			</h4>
			<hr>
			<p><strong style="color:green">{{session('insertMSG')->student_name}}</strong> has been added to students list.</p>
		</div>
		@endif
		@if(session('Supdate'))
			<div class="panel panel-success">
				<div class="panel-heading"> 
					{{ session('Supdate')->student_name }} was sucessfully Updated!
				</div>
			</div>
		@endif
		@foreach($students as $student)
			<div class="panel panel-success">
				<div class="panel-heading">
					<a href="{{ url("student/detail/$student->id")}}">
						Name: <strong>{{ $student->student_name }}</strong>
					</a>
					<div class="pull-right">
						<a href="{{ url("student/delete/$student->id")}}" style="color:red;">
							<i class="fas fa-user-times"></i>
						</a>
						<a href="{{ url("student/edit/$student->id")}}" style="color:blue;">
							<i class="fas fa-edit"></i>
						</a>
					</div>
				</div>
				<div class="panel-body">
					<p><strong>Address- </strong>{{ $student->student_address }}</p>
					<p><strong>Class id- </strong>{{ $student->class_id }}</p>
					<p><strong>Phone- </strong>{{ $student->phno }}</p>
					<p><strong>Email- </strong>{{ $student->email }}</p>
				</div>
				<div class="panel-footer">
					<p>Created at <b style="color:green">{{ $student->created_at->diffForHumans() }}</b></p><br>
					<p>Updated at <b style="color:green">{{ $student->updated_at->diffForHumans() }}</b></p>
				</div>
			</div>
		@endforeach
	</ul>
</div>
@endsection