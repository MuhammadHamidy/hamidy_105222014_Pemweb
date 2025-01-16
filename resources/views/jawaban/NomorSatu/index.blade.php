<div class="dropdown-menu dropdown-menu-right">
	@if (Auth::user())
		<form method="POST" action="{{ route('logout') }}" style="display: inline;" id="logout-form">
			@csrf
			<button type="submit" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<i class="ni ni-user-run"></i> <span>Logout</span>
			</button>
		</form>
	@else
		<a class="dropdown-item" data-toggle="modal" data-target="#loginModal">
			<i class="ni ni-bold-right"></i> <span>Login</span>
		</a>
	@endif
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-dialog-centered" role="document">
    	<form class="modal-content" method="POST" action="{{ route('auth') }}">
			@csrf
      		<div class="modal-header">
        		<h5 class="modal-title" id="loginModalLabel">Login</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
	      	<div class="modal-body">
	        	<div class="form-group">
					<label for="email-input" class="form-control-label">Email / Username</label>
					<input class="form-control" type="text" name="email" required 
						   placeholder="Enter email or username" id="email-input">
				</div>
				<div class="form-group">
					<label for="password-input" class="form-control-label">Password</label>
					<input class="form-control" type="password" name="password" required 
						   placeholder="Enter password" id="password-input">
				</div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="submit" class="btn btn-primary">Login</button>
	      	</div>
    	</form>
  	</div>
</div>