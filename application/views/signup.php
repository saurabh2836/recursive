<?php 
$first_name = $last_name = $email = $mobile =  '';

if($this->session->userdata('signup_details')){
		$signup_details = $this->session->userdata('signup_details');
		$first_name = $signup_details['firstName'];
		$last_name = $signup_details['lastName'];
		$email = $signup_details['email'];
		$mobile = $signup_details['mobile'];
	}
?>

<div class="container margin-top-15">
    <div class=" col-xs-12 ws-col-centered">
        <h1 class="ws-page-title text-center">Sign Up!</h1>
        <?php echo $this->session->flashdata('signup_message'); ?>
        <form class="form" id="signupForm" name="signupForm" role="form" action='<?php echo base_url(); ?>home/verifyUser' method='post'>
            <div class="form-group">
                <label class="sr-only" for="firstName">First  Name</label>
                <input type='text' class="form-control" id="firstName" name="firstName" placeholder="First Name" required='required' value="<?php echo $first_name; ?>">
            </div>
            <div class="form-group">
                <label class="sr-only" for="lastName">Last Name</label>
                <input type='text' class="form-control" id="lastName" name=
                       "lastName" placeholder="Last Name" required='required' value="<?php echo $last_name; ?>">
            </div>
            <div class="form-group">
                <label class="sr-only" for="email">Email</label>
                <input class="form-control" id="email" name="email" type='email'
                       placeholder="Email" required = 'required' value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label class="sr-only" for="mobile">Mobile</label>
                <input class="form-control" id="mobile" name="mobile"
                       placeholder="Mobile Number" type="text" value="<?php echo $mobile; ?>">
            </div>
            <div class="form-group">
                    <select class="form-control" name="role">
                        <option value="0" selected="selected">Select Role</option>
                                <option value="1">customer</option>
                                <option value="2">Admin</option>
                        </select>
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Password</label>
                <input class="form-control" id="password" name=
                       "password" required='required' placeholder="Password" type="password" >
            </div>
             <div class="form-group">
                <label class="sr-only" for="conpassword">Confirm
                    Password</label> 
                <input class="form-control" id= "conpassword" required='required' name="conpassword" placeholder=
                                        "Confirm Password" type="password">
            </div>
            <div class="form-group">
            <input class="btn btn-info form-control" id='ws-login-button' type='submit' value='Sign Up'/>
            </div>
        </form>
    </div>
</div>