@extends('layouts/app')
@section('content')
<div class="container">
	<form method="post">
			<h3>Insert New Course</h3>
			
		{{ csrf_field() }}
		@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li> {{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="row col-lg-4">
			<div class="form-group col-lg-12">
				<label for="cname">Course Name</label>
				<input type="text" name="cname" class="form-control" placeholder="Course Name">
			</div>
		</div>
		<div class="form-group col-lg-12">
			<a href="{{ url("course")}}"><button type="button" class="btn btn-info">Back</button></a>
			<button type="reset" class="btn btn-warning">Clear</button>
			<input type="submit" name="insert" value="Insert" class="btn btn-success">
		</div>
		</div>
	</form>
</div>
@endsection