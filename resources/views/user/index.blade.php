@extends('base')

@section('modalContent')
@error('message')
				        		<span class="alert alert-danger">{{ $message }}</span>
				        	@enderror
<section style="background-color: #eee; margin:40px">
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
                
              <a href="{{ url('user/' . $user->id . '/edit') }}" class="btn btn-primary" style="margin-top:20px; margin-bottom:50px;">EDIT</a>
              
                  <a href="javascript: void(0);"
                        class = "deleteRow btn btn-primary"
                        data-name="user {{ $user->name }}"
                        data-url="{{ url('user/' . $user->id ) }}"
                        data-toggle="modal"
                        data-target="#modalDelete"
                        style="text-decoration:none; margin-top:20px; margin-bottom:50px; ">{{ __('DELETE') }}
                   </a>
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
                <p class="text-muted mb-0" style="font-size:18px; margin-top:100px">{{Auth::user()->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" style="font-size:18px;">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0" style="font-size:18px;">{{Auth::user()->email}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>
<form action="" method="post" id="deleteForm">
    @csrf
    @method('delete')
</form>
@endsection