@extends('layouts/app')
@section('content')
<div class="container">
	<form method="post">
			<h3>Insert New Students</h3>

		{{ csrf_field() }}
		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li> {{ $error }} </li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="row col-lg-4">
			<div class="form-group col-lg-12">
				<label for="studentName">Name</label>
				<input type="text" name="studentName" class="form-control" placeholder="Student Name">
				<label for="studentAddress">Address</label>
				<textarea name="studentAddress" class="form-control" placeholder="body text"></textarea>
				<label for="email">E-mail</label>
				<input type="email" name="email" class="form-control" placeholder="email address">
			</div>
		</div>
		<div class="row col-lg-4">
			<div class="form-group col-lg-12">
				<label for="classID">Class ID</label>
				<select name="classID" class="form-control">
				@foreach($courses as $course)
					<option value="{{ $course->id }}">{{ $course->course_name }}</option>
				@endforeach
				</select>
				<label for="phno">Phone</label>
				<input type="text" name="phno" class="form-control" placeholder="phone number">
			</div>
			<div class="form-group col-lg-12">
				<a href="{{ url("student")}}"><button type="button" class="btn btn-info">Back</button></a>
				<button type="reset" class="btn btn-warning">Clear</button>
				<input type="submit" name="insert" value="Insert" class="btn btn-success">
			</div>
		</div>
	</form>
</div>
@endsection
