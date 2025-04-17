<?php

include("header.php");

?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate mb-0 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact Us <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Signup</h1>
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
										<h3 class="mb-4">Signup</h3>
										<form method="POST" >
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="name">Full Name</label>
														<input type="text" class="form-control" name="u_name" id="name" placeholder="Name">
													</div>
												</div>
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
                                                    <div class="col-md-6">
													<div class="form-group">
														<label class="label" for="subject">Phone Number</label>
														<input type="tel" class="form-control" name="u_phone" id="subject" placeholder="Phone Number">
													</div></div>
												
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="#">Address</label>
														<textarea name="u_add" class="form-control" id="message" cols="30" rows="4" placeholder="Address"></textarea>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<button type="submit" name="btn" class="btn btn-primary">Signup</button>

                                                        <a href="signin.php">Signin</a>
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
include('connect.php');
if(isset($_POST['btn'])){
$name = $_POST['u_name'];
$email = $_POST['u_email'];
$pass = $_POST['u_pass'];
$add = $_POST['u_add'];
$phone = $_POST['u_phone'];


$insert = "INSERT INTO `user`(`user_name`, `user_email`, `user_pass`, `user_address`, `user_phone`, `user_role`) VALUES ('$name','$email','$pass','$add','$phone','User')";

$run = mysqli_query($con , $insert);
if($run){
    header("location:index.php");
}


}

?>