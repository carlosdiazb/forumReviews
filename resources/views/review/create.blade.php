@extends('base')
@section('modalContent')
@error('message')
		<span class="alert alert-danger">{{ $message }}</span>
	@enderror
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('review') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3" style="margin-top:20px;">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end" style="font-size:20px;">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-top:20px;">
                            <label for="tipo" class="col-md-4 col-form-label text-md-end" style="font-size:20px;">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select name="tipo" id="tipo" required>
                                    <option value=""selected disabled hidden>Select type</option>
                                        @foreach($types as $index => $type)
                                            <option value="{{ $index }}">{{ $type }}</option>
                                        @endforeach
                                </select>
                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="margin-top:20px;">
                            <label for="review" class="col-md-4 col-form-label text-md-end" style="font-size:20px;">{{ __('Review') }}</label>

                            <div class="col-md-6">
                                <textarea id="review" rows="20" class="form-control" name="review" placeholder="{{ old('review') }}" required style="width:500px;"></textarea>

                                @error('review')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3" style="margin-top:20px;">
                            <label for="thumbnail" class="col-md-4 col-form-label text-md-end" style="font-size:20px;">{{ __('Thumbnail') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="thumbnail" id="thumbnail" accept="image/jpeg" required/>
                            </div>
                        </div>
                        
                        <div class="row mb-3" style="margin-top:20px;">
                            <label for="images" class="col-md-4 col-form-label text-md-end" style="font-size:20px;">{{ __('Review images') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="images[]" id="images" accept="image/jpeg" multiple required/>
                            </div>
                        </div>

                        <div class="row mb-0" style="margin-top:30px;">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn" style="background-color:black; color:white; width:80px;">
                                    {{ __('CREATE') }}
                                </button>
                                <a class="btn" href="{{ url('reviews/films') }}" style="background-color:black; color:white; width:80px;">BACK</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection