{{-- .............................................................. --}}

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="{{ url('/') }}"><img src="{{ asset('frontend/assets/img/logo1.png') }}" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('track.orders') }}" >Track</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('todays.offer') }}" >Shop</a></li>
							
							@auth
							<li class="nav-item">
								<a class="nav-link" href="{{ route('dashboard') }}">User Dashboard</a>							
							</li>
							@else
							<li class="nav-item">
								<a class="nav-link" href="{{ route('dashboard') }}">Login</a>							
							</li>
							@endauth
						
						</ul>
						<ul class="nav navbar-nav navbar-right"> 
				{{----------------------- Cart -----------------}}
							{{-- <div id="myBt" class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
								<div class="items-cart-inner">
								  <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
								  <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
								  <div class="total-price-basket"> <span id="sp" class="lbl">cart -</span> 
									<span class="total-price"> <span class="sign">TK </span>
									<span class="value" id="cartSubTotal"> </span> </span> </div>
								</div>
								</a>
					
								<ul class="dropdown-menu">
								  <li>
					 <!--   // Mini Cart Start with Ajax -->
					
							 <div id="miniCart">
					
							</div>
					
					<!--   // End Mini Cart Start with Ajax -->
									<div class="clearfix cart-total">
									  <div class="pull-right"> <span class="text">Sub Total :</span>
										<span class='price'  id="cartSubTotal"> </span> </div>
									  <div class="clearfix"></div>
									  <a href="{{route('mycart')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
									<!-- /.cart-total--> 
									
					
								  </li>
								</ul>
								<!-- /.dropdown-menu--> 
							  </div> --}}
							{{-- END Cart --}}
							{{-- <li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li> --}}
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
				

				<div style="padding-right: 30px" id="myBt" class="mydropdown dropdown-cart"> <a href="#" class="lnk-cart" data-toggle="dropdown">
					<div class="items-cart-inner">
					  <div class="basket"><i class="ti-bag"></i><span class="cn" style="font-size: .6rem;
						position: absolute;
						display: flex;
						justify-content: center;
						align-items: center;
						top: 22px;
						right: 19px;
						width: 18px;
						height: 18px;
						color: #fff;
						background-color: #FF9201;
						border-radius: 50%;" class="count" id="cartQty"></span> </div>
					  {{-- <div class="basket-item-count"><span class="count" id="cartQty"> </span></div> --}}
					  {{-- <div class="total-price-basket"> <span id="sp" class="lbl">cart -</span> 
						<span class="total-price"> <span class="sign">TK </span>
						<span class="value" id="cartSubTotal"> </span> </span> </div> --}}
					</div>
					</a>
		
					<ul class="dropdown-menu">
					  <li>
		 <!--   // Mini Cart Start with Ajax -->
		
				 <div id="miniCart">
		
				</div>
		
		<!--   // End Mini Cart Start with Ajax -->
						<div class="clearfix cart-total">
						  <div class="pull-right"> <span class="text">Sub Total :</span>
							<span class='price'  id="cartSubTotal"> </span> </div>
						  <div class="clearfix"></div>
						  <a href="{{route('mycart')}}" class="btn-block genric-btn" style="background: linear-gradient(90deg, #ffba00 0%, #ff6c00 100%); color:white;">Checkout</a> </div>
						<!-- /.cart-total--> 
						
		
					  </li>
					</ul>
					<!-- /.dropdown-menu--> 
				  </div>



			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between" method="post" action="{{ route('product.search') }}">
					@csrf
					<input type="text" class="form-control" id="search" name="search" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>


	</header>
	<!-- End Header Area -->