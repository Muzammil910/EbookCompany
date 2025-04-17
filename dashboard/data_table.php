<?php
include('header.php');
?>
    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="serach_field-area">
                            <div class="search_inner">
                                <form action="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search here..." >
                                    </div>
                                    <button type="submit"> <img src="img/icon/icon_search.svg" alt=""> </button>
                                </form>
                            </div>
                        </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">
                            <li>
                                <a href="#"> <img src="img/icon/bell.svg" alt=""> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="img/icon/msg.svg" alt=""> </a>
                            </li>
                        </div>
                        <div class="profile_info">
                            <img src="img/client_img.png" alt="#">
                            <div class="profile_info_iner">
                                <p>Welcome Admin!</p>
                                <h5>Travor James</h5>
                                <div class="profile_info_details">
                                    <a href="#">My Profile <i class="ti-user"></i></a>
                                    <a href="#">Settings <i class="ti-settings"></i></a>
                                    <a href="#">Log Out <i class="ti-shift-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ menu  -->
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Table</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form Active="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search content here...">
                                            </div>
                                            <button type="submit"> <i class="ti-search"></i> </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="add_button ms-2">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addcategory" class="btn_1">Add New</a>
                                </div>
                            </div>
                        </div>

                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <table class="table lms_table_active">
                                <thead>
                                    <tr>
                                        <th scope="col">title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Lesson</th>
                                        <th scope="col">Enrolled</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                        <td>Category name</td>
                                        <td>Teacher James</td>
                                        <td>Lessons name</td>
                                        <td>16</td>
                                        <td>$25.00</td>
                                        <td><a href="#" class="status_btn">Active</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                        <td>Category name</td>
                                        <td>Teacher James</td>
                                        <td>Lessons name</td>
                                        <td>16</td>
                                        <td>$25.00</td>
                                        <td><a href="#" class="status_btn">Active</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                        <td>Category name</td>
                                        <td>Teacher James</td>
                                        <td>Lessons name</td>
                                        <td>16</td>
                                        <td>$25.00</td>
                                        <td><a href="#" class="status_btn">Active</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                        <td>Category name</td>
                                        <td>Teacher James</td>
                                        <td>Lessons name</td>
                                        <td>16</td>
                                        <td>$25.00</td>
                                        <td><a href="#" class="status_btn">Active</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                        <td>Category name</td>
                                        <td>Teacher James</td>
                                        <td>Lessons name</td>
                                        <td>16</td>
                                        <td>$25.00</td>
                                        <td><a href="#" class="status_btn">Active</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                        <td>Category name</td>
                                        <td>Teacher James</td>
                                        <td>Lessons name</td>
                                        <td>16</td>
                                        <td>$25.00</td>
                                        <td><a href="#" class="status_btn">Active</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                        <td>Category name</td>
                                        <td>Teacher James</td>
                                        <td>Lessons name</td>
                                        <td>16</td>
                                        <td>$25.00</td>
                                        <td><a href="#" class="status_btn">Active</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                        <td>Category name</td>
                                        <td>Teacher James</td>
                                        <td>Lessons name</td>
                                        <td>16</td>
                                        <td>$25.00</td>
                                        <td><a href="#" class="status_btn">Active</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                        <td>Category name</td>
                                        <td>Teacher James</td>
                                        <td>Lessons name</td>
                                        <td>16</td>
                                        <td>$25.00</td>
                                        <td><a href="#" class="status_btn">Active</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                        <td>Category name</td>
                                        <td>Teacher James</td>
                                        <td>Lessons name</td>
                                        <td>16</td>
                                        <td>$25.00</td>
                                        <td><a href="#" class="status_btn">Active</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> <a href="#" class="question_content"> title here 1</a></th>
                                        <td>Category name</td>
                                        <td>Teacher James</td>
                                        <td>Lessons name</td>
                                        <td>16</td>
                                        <td>$25.00</td>
                                        <td><a href="#" class="status_btn">Active</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- footer part -->
<div class="footer_part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="footer_iner text-center">
                    <p>2020 © Influence - Designed by<a href="#"> Dashboard</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- main content part end -->

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

<!-- active_chart js -->
<!-- <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {?> -->
<script src="js/active_chart.js"></script>
<script src="vendors/apex_chart/radial_active.js"></script>
<script src="vendors/apex_chart/stackbar.js"></script>
<script src="vendors/apex_chart/area_chart.js"></script>
<script src="vendors/apex_chart/bar_active_1.js"></script>
<script src="vendors/chartjs/chartjs_active.js"></script>
<!-- <?php }?> -->

</body>
</html>