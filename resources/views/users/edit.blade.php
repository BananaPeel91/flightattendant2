@extends('layouts.app')

@section ('content')
<div class="row">
<div class="col" style="background-color: #fff; margin-top: 20px">
	<h1>Edit Profile</h1>
</div>
</div>

<div class="row">
<div class="col" style="background-color: #fff; margin-top: 20px">
 	<form method="POST" action="/users/update">
 		{{csrf_field() }}

 	<input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">

 	<div class="form-group">
 		<label for="name">Name</label>
 		<input type="text" id="name" name="name" class="form-control">
 	</div>

 	<div class="form-group">
 		<label for="email">Email</label>
 		<input type="email" is="email" name="email" class="form-control">
 	</div>

 	<button class="btn btn-primary" type="submit">Edit Details</button>



 	</form>
</div>
</div>


@endsection