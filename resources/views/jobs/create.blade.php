@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
        <div class="col" style="background-color: #fff; margin-top: 10px">
            <h1>Create a Job</h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-6 offset-3" style="background-color: #fff; margin-top: 10px">

       @if (auth()->check()&& auth::user()->user_role_id == 2)

    
      

    		<form method="POST" action="/jobs/create">

    		    {{csrf_field() }}

    			<input type="hidden" id="operator_id" name="operator_id" value="{{ $operatorUser->operator_id}}">




    			<div class="form-group">
    			<label for="aircrafT_model">Choose Aircraft</label>
    				<select name="aircraft_id" id="aircraft_id" class="form-control" required>
    					<option value="">Choose One...</option>
    						@foreach ($aircrafts as $aircraft)
    							<option value="{{ $aircraft->id}}">
    								{{ $aircraft->name }}</option>
    						@endforeach
    				</select>
    			</div>



    			
    			 

                  <div class="form-group">

                            <label for="value">Price:</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('value') }}" required>

                 </div>

                   <div class="form-group">

                            <label for="start_date">Start Date</label>
                            <input type="Date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>

                 </div>

                  <div class="form-group">

                            <label for="end_date">End Date</label>
                            <input type="Date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>

                 </div>

                  

                 <h3>Routing</h3>

                 <div class="form-group">
                    <label for="Origin">Origin:</label>
                      <select name="jobRoutes[1][origin_id]" id="origin_id" class="form-control" required>
                        <option value="">Choose One...</option>
                          @foreach ($airports as $airport)
                            <option value="{{ $airport->id}}">
                              {{ $airport->name }}</option>
                        @endforeach
                      </select>
                  </div>

                   <div class="form-group">
                    <label for="Destination">Destination:</label>
                      <select name="jobRoutes[1][destination_id]" id="destination_id" class="form-control" required>
                        <option value="">Choose One...</option>
                          @foreach ($airports as $airport)
                            <option value="{{ $airport->id}}">
                              {{ $airport->name }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                  <label for="departure_date">Departure Date</label>
                     <input type="Date" class="form-control" id="departure_date" name="jobRoutes[1][departure_date]"  required>
                  </div>

                  <div class="form-group">
                  <label for="departure_date">Departure Time</label>
                     <input type="time" class="form-control" id="departure_time" name="jobRoutes[1][departure_time]" value="{{ old('close_date') }}" required>
                  </div>



                 <h3>Routing</h3>

                 <div class="form-group">
                    <label for="Origin">Origin:</label>
                      <select name="jobRoutes[2][origin_id]" id="origin_id" class="form-control" required>
                        <option value="">Choose One...</option>
                          @foreach ($airports as $airport)
                            <option value="{{ $airport->id}}">
                              {{ $airport->name }}</option>
                        @endforeach
                      </select>
                  </div>

                   <div class="form-group">
                    <label for="Destination">Destination:</label>
                      <select name="jobRoutes[2][destination_id]" id="destination_id" class="form-control" required>
                        <option value="">Choose One...</option>
                          @foreach ($airports as $airport)
                            <option value="{{ $airport->id}}">
                              {{ $airport->name }}</option>
                        @endforeach
                      </select>
                  </div>

                   <div class="form-group">
                  <label for="departure_date">Departure Date</label>
                     <input type="Date" class="form-control" id="departure_date" name="jobRoutes[2][departure_date]"  required>
                  </div>

                  <div class="form-group">
                  <label for="departure_date">Departure Time</label>
                     <input type="time" class="form-control" id="departure_time" name="jobRoutes[2][departure_time]" value="{{ old('close_date') }}" required>
                  </div>


                


                 <button type="submit" class="btn btn-primary">Create</button>


    		</form>

         @elseif (auth()->check()&& auth::user()->user_role_id == 1)

          <p class="text-center"> You must be signed in as an Operator to create a Mission </p>

          @else

            <p class="text-center"> Please <a href="{{ route('login') }}">sign in</a>  to participate </p>
          @endif

    	</div>
    </div>
</div>
@endsection