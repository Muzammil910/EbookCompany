<?php

include("header.php");
include('connect.php');
if(isset($_POST['btn'])){
	$email = $_POST['u_email'];
	$pass = $_POST['u_pass'];
	$select = "SELECT * FROM `user` WHERE `user_email` = '$email' AND `user_pass` = '$pass'";
	$run = mysqli_query($con , $select);
	$row = mysqli_num_rows($run);
	$data = mysqli_fetch_assoc($run);
	if($row != ""){
		$_SESSION['name'] = $data['user_name'];
		$_SESSION['role'] = $data['user_role'];
	if($_SESSION['role'] == 'User'){
		// header("location:index.php");
		echo "<script> window.location.href='index.php'</script>";
	}
	else if($_SESSION['role'] == 'Admin'){
		// header("location:../dashboard/index.php");
		echo "<script>window.location.href='../dashboard/index.php'</script>";
	}
	}

}
?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate mb-0 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact Us <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Signin</h1>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="wrapper px-md-4">
							
							<div class="row no-gutters">
								<div class="col-md-7">
									<div class="contact-wrap w-100 p-md-5 p-4">
										<h3 class="mb-4">Signin</h3>
										<form method="POST" >
											<div class="row">
												
												<div class="col-md-6"> 
													<div class="form-group">
														<label class="label" for="email">Email Address</label>
														<input type="email" class="form-control" name="u_email" id="email" placeholder="Email">
													</div>
												</div>
                                                
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="subject">Password</label>
														<input type="password" class="form-control" name="u_pass" id="subject" placeholder="Password">
													</div>
                                                    </div>
                                               
												<div class="col-md-12">
													<div class="form-group">
														<button type="submit" name="btn" class="btn btn-primary">Signin</button>
                                                        <a href="signup.php">Signup</a>
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-5 order-md-first d-flex align-items-stretch">
									<div id="map" class="map"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

  <?php
  include("footer.php");


?>