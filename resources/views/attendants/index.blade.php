@extends('layouts.app')

@section ('content')

    <div class="row">
        <div class="col" style="background-color: #fff; margin-top: 10px">
            <h1>Attendants</h1>
        </div>
    </div>

   <div class="row">
    <div class="col-3" >
    <div class="row">
    <div class="col" style="background-color: #fff; margin-top: 10px; margin-bottom: 10px;  padding-bottom: 5px;">
      <h3>Filter Results</h3>

        

     <div class="form-group">
        <select class="form-control">
        <option>Choose An Aircraft</option>
        <option>Citation XLS</option>
        <option>Hawker 900XP</option>
        </select>
        </div>
     
   

    <button class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
    </div>
    
    
    <div class="col-8 offset-md-1"  >
    @foreach($attendants as $attendant)
        <div class="row">
            <div class="col" style="background-color: #fff; margin-top: 10px; margin-bottom: 10px; padding-bottom: 5px;">
            <a href="/users/{{$attendant->id}}"><h3>{{$attendant->name}}</h3></a>
            <h3>{{$attendant->email}}</h3>
      
            
    
          
           
            
    
            <a href="/users/{{$attendant->id}}"><button class="btn btn-primary">View Profile</button></a>
            </div>
      </div>
      @endforeach

 
    </div>


  </div>

@endsection