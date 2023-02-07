@extends('base')
@section('modalContent')
            <div class="w3_content_agilleinfo_inner">
						<div class="agile_featured_movies">
							@error('message')
				        		<span class="alert alert-danger">{{ $message }}</span>
				        	@enderror
				            <div class="inner-agile-w3l-part-head">
					            <h3 class="w3l-inner-h-title">{{ $review->nombre }}</h3>
							</div>
							   <div class="latest-news-agile-info">
								   <div class="col-md-8 latest-news-agile-left-content">
								   	<div class="single video_agile_player" >
										            <div class="video-grid-single-page-agileits" style="margin-top:40px;">
										            	<div style="background-image: url('data:image/jpeg;base64,{{ $review->thumbnail }}'); background-size:cover; background-repeat:no-repeat; width:100%; height:600px"></div>
														 
													</div>
										    </div>
								   	<p style="font-size:18px; margin-top:680px;">{{$review->review}}</p>
								   			
											<div class="single video_agile_player" style="height:auto; display:flex; flex-wrap:wrap; gap:5px;" >
												
											       @foreach($review->images as $image)
										            <div class="video-grid-single-page-agileits" style="margin-top:40px;">
										            	<div style="background-image: url('{{ asset('storage/images/' . $image->name) }}'); background-size:cover; background-repeat:no-repeat; width:300px; height:300px;"></div>
														 <!--<img src="{{ asset('storage/images/' . $image->name) }}" alt="" class="img-responsive" style="width:240px; height:240px;"/> -->
													</div>
													@endforeach
										    </div>
											<div class="single-agile-shar-buttons">
											    <h5 >Share This :</h5>
													<ul>
														<li>
															<div class="fb-like" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
															<script>(function(d, s, id) {
															  var js, fjs = d.getElementsByTagName(s)[0];
															  if (d.getElementById(id)) return;
															  js = d.createElement(s); js.id = id;
															  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
															  fjs.parentNode.insertBefore(js, fjs);
															}(document, 'script', 'facebook-jssdk'));</script>
														</li>
														<li>
															<div class="fb-share-button" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fw3layouts&amp;src=sdkpreparse">Share</a></div>
														</li>
														<li class="news-twitter">
															<a href="https://twitter.com/w3layouts" class="twitter-follow-button" data-show-count="false">Follow @w3layouts</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
														</li>
														<li>
															<a href="https://twitter.com/intent/tweet?screen_name=w3layouts" class="twitter-mention-button" data-show-count="false">Tweet to @w3layouts</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
														</li>
														<li>
															<!-- Place this tag where you want the +1 button to render. -->
															<div class="g-plusone" data-size="medium"></div>

															<!-- Place this tag after the last +1 button tag. -->
															<script type="text/javascript">
															  (function() {
																var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
																po.src = 'https://apis.google.com/js/platform.js';
																var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
															  })();
															</script>
														</li>
													</ul>
											</div>
											
											<button type="submit" class="btn" style="background-color:black; color:white; width:80px; margin-top:40px; margin-left:40%;">
                                    			<a href="{{ url('review/'. $review->id . '/edit') }}" style="text-decoration:none; color:white;">{{ __('EDIT') }}</a>
                                			</button>
                                			<button type="submit" class="btn" style="background-color:black; color:white; width:80px; margin-top:40px; margin-left:5%;">
                                    			<a href="javascript: void(0);"
			                                        class = "deleteRow"
			                                        data-name="review about {{ $review->nombre }}"
			                                        data-url="{{ url('review/' . $review->id ) }}"
			                                        data-toggle="modal"
			                                        data-target="#modalDelete"
			                                        style="text-decoration:none; color:white;">{{ __('DELETE') }}</a>
                                			</button>
											
										
										<div class="response">
							<h4>Responses</h4>
							@foreach($review->comments as $comment)
							<div class="media response-info" style="border:.5px solid #9c9c9c;">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" style="width:100px; height:100px;"  src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="">
									</a>
									<h5><a href="#">{{ $comment->user->name }}</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>{{ $comment->text }}</p>
									<ul>
										<li>{{ \Str::substr($comment->created_at, 0,10); }}</li>
										<li><a href="{{ url('comment/' . $comment->id . '/edit') }}"><i class="fa fa-reply" aria-hidden="true"></i> Edit</a></li>
										<li><a href="#"><a href="javascript: void(0);"
			                                        class = "deleteRow"
			                                        data-name="comment"
			                                        data-url="{{ url('comment/' . $comment->id ) }}"
			                                        data-toggle="modal"
			                                        data-target="#modalDelete"
			                                        style="text-decoration:none; "><i class="fa fa-reply" aria-hidden="true"></i> Delete</a></li>
									</ul>		
								</div>
								<div class="clearfix"> </div>
							</div>
							@endforeach
						</div>
											<div class="all-comments-info">
												 <h5 >LEAVE A COMMENT</h5>
												<div class="agile-info-wthree-box">
													<form action="{{ url('comment') }}" method="post">
														@csrf
														<textarea name="text" placeholder="Message" style="width:56.85%; height:200px;" required=""></textarea>
														<input type="hidden" name="idreview" value="{{ $review->id }}"/>
														<input type="submit" value="SEND">
													 <div class="clearfix"> </div>
													</form>
												</div>
											</div>
								   </div>
								   <div class="col-md-4 latest-news-agile-right-content">
								   <h4 class="side-t-w3l-agile">For Latest <span>Posts</span></h4>
										<div class="side-bar-form">
										 <form action="#" method="post">
											<input type="search" name="email" placeholder="Search here...." required="required">
											<input type="submit" value=" ">
										 </form>
									    </div>
								      <h4 class="side-t-w3l-agile">Hot <span>Topics</span></h3>
									    <ul class="side-bar-agile">
										   <li><a href="#">John Abraham, Sonakshi Sinha and Tahir ...</a><p>Sep 29, 2016</p></li>
										   <li><a href="#">Romantic drama about two people finding out that love</a><p>Feb 3, 2016</p></li>
										   <li><a href="#">Storks have moved on from delivering babies to packages ...</a><p>Aug 1, 2016</p></li>
										   <li><a href="#">John Abraham, Sonakshi Sinha and Tahir ...</a><p>Sep 29, 2016</p></li>
										   <li><a href="#">John Abraham, Sonakshi Sinha and Tahir ...</a><p>Sep 29, 2016</p></li>
										</ul>
										<h4 class="side-t-w3l-agile">Latest <span>Trailer</span></h3>
										<div class="video_agile_player sidebar-player">
										            <div class="video-grid-single-page-agileits">
														<div id="video1"> <img src="{{ url('assets/images/22.jpg') }}" alt="" class="img-responsive"></div>
													</div>


										        <div class="player-text side-bar-info">
												<p class="fexi_header">Me Before You </p>
												<p class="fexi_header_para"><span class="conjuring_w3">Story Line<label>:</label></span>Me Before You Official Trailer #2 (2016) - Emilia Clarke, Sam Claflin Movie HD

A girl in a small town forms an unlikely....</p>
												<p class="fexi_header_para"><span>Release On<label>:</label></span>Feb 3, 2016 </p>
												<p class="fexi_header_para">
													<span>Genres<label>:</label> </span>
													<a href="#">Drama</a> | 
													<a href="#">Adventure</a> | 
													<a href="#">Family</a>								
												</p>
												<p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
													<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
													<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
													<a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
													<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
													<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
												</p>
											</div>

										    </div>
											<div class="clearfix"> </div>
											<div class="agile-info-recent">
											<h4 class="side-t-w3l-agile">Latest <span>Trailer</span></h4>
											<div class="w3ls-recent-grids">
												<div class="w3l-recent-grid">
													<div class="wom">
														<a href="#"><img src="{{ url('assets/images/m12.jpg') }}" alt=" " class="img-responsive"></a>
													</div>
													<div class="wom-right">
														<h5><a href="#">Lorem Integer rutrum</a></h5>
														<p>Mauris fermentum dictum magna. Sed laoreet aliquam leo. 
															Ut tellus dolor, dapibus eget.</p>
															<ul class="w3l-sider-list">
																<li><i class="fa fa-clock-o" aria-hidden="true"></i>On Jan 12, 2016</li>
																<li><i class="fa fa-eye" aria-hidden="true"></i> 2602</li>
															</ul>
													</div>
													<div class="clearfix"> </div>
												</div>
												<div class="w3l-recent-grid">
													<div class="wom">
														<a href="#"><img src="{{ url('assets/images/m13.jpg') }}" alt=" " class="img-responsive"></a>
													</div>
													<div class="wom-right">
															<h5><a href="#">Lorem Integer rutrum</a></h5>
														<p>Mauris fermentum dictum magna. Sed laoreet aliquam leo. 
															Ut tellus dolor, dapibus eget.</p>
															<ul class="w3l-sider-list">
																<li><i class="fa fa-clock-o" aria-hidden="true"></i>On Mar 3, 2016</li>
																<li><i class="fa fa-eye" aria-hidden="true"></i> 2742</li>
															</ul>
													</div>
													<div class="clearfix"> </div>
												</div>
												<div class="w3l-recent-grid">
													<div class="wom">
														<a href="#"><img src="{{ url('assets/images/m14.jpg') }}" alt=" " class="img-responsive"></a>
													</div>
													<div class="wom-right">
															<h5><a href="#">Lorem Integer rutrum</a></h5>
														    <p>Mauris fermentum dictum magna. Sed laoreet aliquam leo. 
															Ut tellus dolor, dapibus eget.</p>
															<ul class="w3l-sider-list">
																<li><i class="fa fa-clock-o" aria-hidden="true"></i>On Oct 13, 2016</li>
																<li><i class="fa fa-eye" aria-hidden="true"></i> 2802</li>
															</ul>
													</div>
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
										
							       </div>
								   <div class="clearfix"></div>
							   </div>
					
						</div>
				</div>
<form action="" method="post" id="deleteForm">
            @csrf
            @method('delete')
        </form>
@endsection