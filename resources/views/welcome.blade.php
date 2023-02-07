@extends('base')
@section('modalContent')
	<div class="w3_content_agilleinfo_inner">
		<div class="agile_featured_movies">
            <h3 class="agile_w3_title"> Latest <span>Movies</span></h3>
			<div class="w3_agile_latest_movies">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
							<a href="single.html" class="hvr-sweep-to-bottom"><img src="images/m5.jpg" title="Movies Pro" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html">Storks</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben one">
								<p>NEW</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection