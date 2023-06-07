 <!-- Navbar -->
 <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
                                 
							
<br><br><br><br><br><img src="../uploads/users/doma1.jpg" alt="" width="90" height="90" style="border-radius:50%"> &nbsp;Srinivasajune@gmail.com
                            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon mt-2">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </span>
                            </button>
                        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                            <ul class="navbar-nav navbar-nav-hover ms-auto">
                        
                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center <?= $page == "category" ? "text-primary" : "" ?>" id="categoryDropDon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons opacity-6 me-2 text-md"></i><br>Add Hospital
                                        <span class="material-icons"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="categoryDropDon">
                                        <div class="d-lg-block d-sm-block">
                                            <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="./?page=category/manage_category">
                                                    <div class="w-100 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <h6 class="text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Add New</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="./?page=category">
                                                    <div class="w-100 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <h6 class="text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">View List</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center <?= $page == "clinic" ? "text-primary" : "" ?>" id="clinicDropDon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons opacity-6 me-2 text-md"></i> <br>&nbsp;Add Doctors
                                        <span class="material-icons"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="clinicDropDon">
                                        <div class="d-lg-block d-sm-block">
                                            <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="./?page=clinic/manage_clinic">
                                                    <div class="w-100 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <h6 class="text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Add New</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="./?page=clinic">
                                                    <div class="w-100 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <h6 class="text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">View List</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>
                               
                                <!-- <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center <?= $page == "sent_items" ? "text-primary" : "" ?>" href="./?page=sent_items" aria-expanded="false">
                                        <i class="material-icons opacity-6 me-2 text-md">send</i> Sent
                                    </a>
                                </li> -->
                              
              
                                        
                 <a class="navbar-brand font-weight-bolder ms-sm-3" href="http://localhost/srinivasa-project/admin/doctors.php" rel="tooltip" title="Developed by srinivasa and team" data-placement="bottom">
                      &nbsp;&nbsp; <br>  Back to Home 
                        </a>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>