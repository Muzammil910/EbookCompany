<?php
include('header.php');
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <!-- sign_in  -->
                            <div class="modal-content cs_modal">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Books</h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data">


                                        <div class="">
                                            <input type="text" name="b_title" class="form-control" placeholder="Enter Book Title">
                                        </div>
                                        <div class="">
                                            <input type="text" name="b_author" class="form-control" placeholder="Enter Book Author">
                                        </div>
                                        <div class="">
                                            <input type="text" name="b_price" class="form-control" placeholder="Enter Book Price">
                                        </div>
                                        <div class="">
                                            <select name="b_cat" id="" class="form-control">
                                                <option value="" selected disabled>Select Category</option>
                                                <?php
                                                include("../project/connect.php");
                                                $select = "SELECT * FROM `categories`";
                                                $run = mysqli_query($con, $select);
                                                while ($row = mysqli_fetch_assoc($run)) {
                                                ?>
                                                    <option value="<?php echo $row['category_id']  ?>"><?php echo $row['category_name']  ?></option>

                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="">
                                            <input type="file" name="b_cover" class="form-control">
                                        </div>

                                        <button type="submit" name="btn" class="btn_1 full_width text-center">Save</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include("../project/connect.php");
    if (isset($_POST['btn'])) {
        $title = $_POST['b_title'];
        $author = $_POST['b_author'];
        $price = $_POST['b_price'];
        $cat = $_POST['b_cat'];
        $type = $_FILES['b_cover']['type'];
        if(strtolower($type == 'image/jpg')
        || strtolower($type == 'image/jpeg')
        || strtolower($type == 'image/png')){

            $imagename = $_FILES['b_cover']['name'];
            $target = 'img/'.basename($imagename);
            if(move_uploaded_file($_FILES['b_cover']['tmp_name'] , $target)){
                $insert = "INSERT INTO `books`(`book_title`, `book_author`, `book_price`, `book_category`, `book_image`) VALUES ('$title','$author','$price','$cat','$imagename')";
                $result = mysqli_query($con, $insert);
                if ($result) {
                    echo "<script>alert('Book Added Successfully')</script>";
                }
            }
        }
       



        
    }

    ?>



    <!-- footer  -->
    <!-- jquery slim -->
    <script src="js/jquery1-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper1.min.js"></script>
    <!-- bootstarp js -->
    <script src="js/bootstrap1.min.js"></script>
    <!-- sidebar menu  -->
    <script src="js/metisMenu.js"></script>
    <!-- waypoints js -->
    <script src="vendors/count_up/jquery.waypoints.min.js"></script>
    <!-- waypoints js -->
    <script src="vendors/chartlist/Chart.min.js"></script>
    <!-- counterup js -->
    <script src="vendors/count_up/jquery.counterup.min.js"></script>
    <!-- swiper slider js -->
    <script src="vendors/swiper_slider/js/swiper.min.js"></script>
    <!-- nice select -->
    <script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>
    <!-- owl carousel -->
    <script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>
    <!-- gijgo css -->
    <script src="vendors/gijgo/gijgo.min.js"></script>
    <!-- responsive table -->
    <script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="vendors/datatable/js/jszip.min.js"></script>
    <script src="vendors/datatable/js/pdfmake.min.js"></script>
    <script src="vendors/datatable/js/vfs_fonts.js"></script>
    <script src="vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="vendors/datatable/js/buttons.print.min.js"></script>

    <script src="js/chart.min.js"></script>
    <!-- progressbar js -->
    <script src="vendors/progressbar/jquery.barfiller.js"></script>
    <!-- tag input -->
    <script src="vendors/tagsinput/tagsinput.js"></script>
    <!-- text editor js -->
    <script src="vendors/text_editor/summernote-bs4.js"></script>

    <script src="vendors/apex_chart/apexcharts.js"></script>

    <!-- custom js -->
    <script src="js/custom.js"></script>


    </body>

    </html>