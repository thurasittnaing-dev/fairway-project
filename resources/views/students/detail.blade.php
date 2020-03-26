@extends('layouts/app')
@section('content')
<div class="container">
	<a href="{{ url("student")}}"><button type="button" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i></button></a>
	<br><br>
	<div class="panel panel-success">
		<div class="panel-heading">
			Name : <strong>{{ $student->student_name }}</strong>
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
	<h3>Comments <span class="badge">{{ count($student->comments)}}</span></h3>
	@if(session('delCMT'))
		<div class="alert alert-danger">
			<div class="alert-heading">
				Completed
			</div>
			<p>{{ session('delCMT') }}</p>
		</div>
	@endif
	<ul class="list-group">
		@foreach($student->comments as $comment)
		<li class="list-group-item">
			{{ $comment->comment }}
			<div class="pull-right">
				<a href="{{ url("/comment/delete/$comment->id")}}" style="color:red;"><i class="fas fa-trash-alt"></i></a>
			</div>
		</li>
		@endforeach
	</ul>
	<br>
	{{-- CommentBox --}}
	<div class="container">
		<form method="post" action="{{ url("/comment/add") }}">
			<h4>Comment Box</h4>
			{{ csrf_field() }}
			@if($errors->any())
				<div class="panel panel-danger">
					@foreach($errors->all() as $error)
						<div class="panel-heading">
							{{ $error }}
						</div>
					@endforeach
				</div>
			@endif
			<div class="form-group col-lg-4">
				<input type="hidden" name="student_id" value="{{ $student->id }}">
				<textarea name="comment" class="form-control"></textarea><br>
				<input type="submit" name="submit" value="Comment" class="btn btn-success">
			</div>	
		</form>
	</div>
</div>
@endsection