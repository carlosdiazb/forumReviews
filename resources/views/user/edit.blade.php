@extends('layouts.app')

@section('content')
@error('message')
				        		<span class="alert alert-danger">{{ $message }}</span>
				        	@enderror
<form method="POST" action="{{ url('user/' . $user->id) }}">
                @csrf
                @method('put')
<section style="background-color: #eee; margin::40px">
  <div class="container py-5">
    

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3" style="margin-top:20px; font-size:21px;">{{Auth::user()->name}}</h5>
            <p class="text-muted mb-1" style="margin-top:10px;">Full Stack Developer</p>
            <p class="text-muted mb-4" style="margin-top:10px;">Bay Area, San Francisco, CA</p>
            <div class="d-flex justify-content-center mb-2">
                
              <button type="submit" class="btn btn-primary" style="margin-top:20px; margin-bottom:50px;">EDIT</button>
              <button class="btn btn-primary" style="margin-top:20px;   margin-bottom:50px;"><a style="text-decoration:none; color:white;" href="{{ url('user') }}">BACK</a></button>
            </div>
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="margin-top:100px; font-size:18px;">Full Name</p>
              </div>
              <div class="col-sm-9">
                <input type="text" name="name" value="{{Auth::user()->name}}" required style="margin-top:100px;"/>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="font-size:18px;">Email</p>
              </div>
              <div class="col-sm-9">
                <input type="email" name="email" required value="{{Auth::user()->email}}"/>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>
</form>
<form action="" method="post" id="deleteForm">
    @csrf
    @method('delete')
</form>
@endsection