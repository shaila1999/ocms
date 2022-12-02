<!-- Start Header Area -->
<header class="default-header">
				<div class="container">
					<div class="header-wrap">
						<div class="header-top d-flex justify-content-between align-items-center">
							<div class="logo">
								<a href="#home"><img src="{{url('/frontend/img/logo.png')}}" alt=""></a>
							</div>
							<div class="main-menubar d-flex align-items-center">
								<nav class="hide">
									<a href="#home">Home</a>
									<a href="#project">Projects</a>
									<a href="#about">About</a>
									<a href="#donate">Donate</a>
									
									
									@auth
									
								    {{auth()->user()->name}}
									
							        <a href="{{route('user.logout')}}">Logout</a>
									@else
									<a href="#" data-toggle="modal" data-target="#login">Login</a>
									<a href="#" data-toggle="modal" data-target="#registration">Registration</a>
									@endauth	
								</nav>
								<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- End Header Area -->