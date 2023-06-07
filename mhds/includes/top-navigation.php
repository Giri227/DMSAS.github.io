 <!-- Navbar -->
 <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
		
						<br><br><br> <br><br><img src="uploads/users/avatar.png"  alt="" width="94.2" height="94.2" style="border-radius:50%">   
						<a class="navbar-brand font-weight-bolder ms-sm-3" href="https://www.google.com/maps/search/hospital/@13.0672786,74.9964194,15.08z" rel="tooltip" title="Developed by srinivasa and team " data-placement="bottom">
                       Find Near By Hospital
                        </a>
							
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
                                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center <?= $page == "clinic" ? "text-primary" : "" ?>" href="./?page=clinic" aria-expanded="false">
                                        <i class="material-icons opacity-6 me-2 text-md"></i>  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								
                                    </a>
                                </li>
                   <a class="navbar-brand font-weight-bolder ms-sm-3" href="http://localhost/srinivasa-project/patient/doctors.php" rel="tooltip" title="Developed by srinivasa and team" data-placement="bottom">
                      &nbsp;&nbsp;Back to Home 
                        </a>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>