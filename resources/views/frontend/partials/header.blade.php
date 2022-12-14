

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a href="#home"><img src="{{url('/frontend/img/logo.png')}}" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>

	 
      <li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle text-bold text-black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Members
        </a>

			  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('parent.form')}}">Parents</a>
          <a class="dropdown-item" href="donor">Donors</a>
        </div>
		
		  </li>

	  <li class="nav-item active">
        <a class="nav-link" href="{{route('orphan.list')}}">Orphans</a>
      </li>

	  <li class="nav-item dropdown">
			@auth
			<a class="nav-link dropdown-toggle text-bold text-black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			{{auth()->user()->name}}
			</a>
      
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
				<a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>

				
			</div>
			@else
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			user
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a href="#" data-toggle="modal" data-target="#login">Login</a>
				<a href="#" data-toggle="modal" data-target="#registration">Registration</a>	
			</div>
			
			@endauth
		</li>	

      
    </ul>
   
  </div>
</nav>	


  <!--modal create----->

  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form action="{{route('user.login')}}" method="post" enctype="multipart/form-data">
      @csrf
        
        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

    
        <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input required name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
        </form>
      

      </div>
      
    </div>
  </div>
</div>





 <!--modal create----->

<div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form action="{{route('registration')}}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
        <label for="name">Enter Your Name:</label>
        <input name="donor_name" type="text" class="form-control" id="name"  placeholder="Enter name">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="donor_email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

		<div class="form-group">
             <label for="">Select type</label>
            <select name="role" id="" class="form-control">
                <option value="parent">Parent</option>
                <option value="donor">Donor</option>
            </select>
        </div>

		<div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input name="address" type="text" class="form-control"  placeholder="address">
        </div>
        

        <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="donor_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Registration</button>
        </form>
      

       
      </div>
      
    </div>
  </div>
</div>
