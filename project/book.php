<?php
include("header.php");

?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate mb-0 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Book Store <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Book Store</h1>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
		<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10">
            <div class="row mb-4">
                <div class="col-md-9 d-flex justify-content-between align-items-center">
                    <h4 class="product-select">Select Types of Products</h4>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Products
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<?php 
		include("connect.php");
		$select = "SELECT * FROM `categories`";
		$run = mysqli_query($con, $select);
		 while ($row = mysqli_fetch_assoc($run)) {
		?>
		<option value="<?php echo $row['category_id'] ?>"><?php echo $row
                ['category_name'] ?></option>
							<!-- <a class="dropdown-item" href="#"><?php echo $row['book_category']?></a> -->
		<?php                       
                    }
                                                    ?>
                            <!-- <a class="dropdown-item" href="#">Audio Books</a>
                            <a class="dropdown-item" href="#">Business Books</a>
                            <a class="dropdown-item" href="#">Children Books</a>
                            <a class="dropdown-item" href="#">Cooking</a>
                            <a class="dropdown-item" href="#">Lifestyles</a>
                            <a class="dropdown-item" href="#">Mystery</a>
                            <a class="dropdown-item" href="#">Romance</a>
                            <a class="dropdown-item" href="#">Science Fiction</a>
                            <a class="dropdown-item" href="#">History</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
			<?php
include("connect.php");
$query = "SELECT * FROM `books` limit 10 ";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_assoc($result)){
?>

    			<div class="col-md-6 col-lg-4 d-flex">
    				<div class="book-wrap d-lg-flex">
    					<div class="img d-flex justify-content-end" style="background-image: url(images/<?php echo $row['book_image']?>);">
    						<div class="in-text">
    							<a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Add to cart">
    								<span class="flaticon-shopping-cart"></span>
    							</a>
    							<a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
    								<span class="flaticon-heart-1"></span>
    							</a>
    							<a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Quick View">
    								<span class="flaticon-search"></span>
    							</a>
    							<a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Compare">
    								<span class="flaticon-visibility"></span>
    							</a>
    						</div>
    					</div>
    					<div class="text p-4">
    						<p class="mb-2"><span class="price"><?php echo $row['book_price']?></span></p>
    						<h2><a href="#"><?php echo $row['book_title']?></a></h2>
    						<span class="position"><?php echo $row['book_author']?></span>
    						<span class="position">Ajao bhae Ajao free hai wo $200 kuch nhi hai</span>

    					</div>
    				</div>
    			</div>
			
    	<?php } ?>		
</div>
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>

  <?php


include("footer.php");
?>