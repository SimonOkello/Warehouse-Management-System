			<form action="login.php" class="form-signin" method="post">
						<h3 class="form-signin-heading"><i class="icon-lock"></i> Log in</h3>
						<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
						<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
						<select style=" width: 100%;  border-radius: 5px; text-align: center; height: 35px " name="category">
						<option value="admin">Admin</option>
						<option value="employee">Employee</option>
						<option value="supplier">Supplier</option>
						<option value="customer">Customer</option>
					</select>
						<button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
																
			</form>
			
			<div id="button_form" class="form-signin" >
			New to the System?
			<hr>
				<h3 class="form-signin-heading"><i class="icon-edit"></i> Register</h3>
				<button data-placement="top" title="Sign Up for Membership" id="sign_up_m" onclick="window.location='signup.php'" id="btn_student" name="login" class="btn btn-info" type="submit">Join Us Now</button>
			</div>
														