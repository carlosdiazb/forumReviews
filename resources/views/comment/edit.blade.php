@extends('base')
@section('modalContent')
<div class="container">
<div class="agile-info-wthree-box" style="width:60%; margin:0 auto">
    <form action="{{ url('comment/' . $comment->id) }}" method="post">
		@csrf
		@method('put')
		<textarea name="text" placeholder="Message" style="width:70%; height:200px; margin-top:30px;" required=""></textarea>
		<input type="submit" value="SEND">
	 <div class="clearfix"> </div>
	</form>
</div>
</div>
@endsection