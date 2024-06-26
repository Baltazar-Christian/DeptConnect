<style>
    .navbar-dark .nav-item .nav-link {
color: #fff;
}

.navbar-dark .nav-item .nav-link:hover {
background-color: rgba(255, 255, 255, 0.1);
transition: all 0.3s ease;
border-radius: 0.25rem;
color: #fff;
}

.fa-li {
position: relative;
left: 0;
}
</style>
      <!--Main Navigation-->
        <header class="mb-4 fixed-top">
            <!-- Jumbotron -->
            <div class="p-3 text-center bg-white border-bottom">
              <div class="container-fluid">
                <div class="row">
                  <!-- Right elements -->
                  <div
                    class="col-md-5 d-flex justify-content-center justify-content-md-start align-items-center d-none d-lg-flex">
                    <a class="text-reset me-3" href="#">
                      <i class="fas fa-th-large"></i>
                    </a>
                    <a class="text-reset me-3" href="#">
                      <i class="fas fa-home"></i>
                    </a>
                    <a class="text-reset me-3" href="#">
                      <i class="fas fa-columns me-1"></i>
                      <span class="d-none d-xl-inline-block">Boards</span>
                    </a>

                    <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0">
                      <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" />
                      <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                    </form>
                  </div>
                  <!-- Right elements -->

                  <!-- Center elements -->
                  <div class="col-md-2 d-none d-lg-block">
                    <a href="#!" class="ms-md-2">
                      <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="35" />
                    </a>
                  </div>
                  <!-- Center elements -->

                  <!-- Right elements -->
                  <div class="col-lg-5 d-flex justify-content-center justify-content-md-end align-items-center">
                    <a class="text-reset me-3" href="#">
                      <i class="fas fa-plus"></i>
                    </a>
                    <a class="text-reset me-3" href="#">
                      <i class="fas fa-info-circle"></i>
                    </a>

                    <!-- Notification -->
                    <div class="dropdown">
                      <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button"
                        data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Some news</a></li>
                        <li><a class="dropdown-item" href="#">Another news</a></li>
                        <li>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                      </ul>
                    </div>

                    <!-- User -->
                    <div class="dropdown">
                      <a class="text-reset dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="22"
                          alt="" loading="lazy" />
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">My profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- Right elements -->
                </div>
              </div>
            </div>
            <!-- Jumbotron -->

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white d-none d-lg-block">
              <!-- Container wrapper -->
              <div class="container-fluid justify-content-center justify-content-md-between">
                <!-- Left elements -->
                <div class="d-flex align-items-center">
                  <button class="btn btn-outline-primary me-1" data-mdb-ripple-color="dark" type="button">
                    <i class="fas fa-clipboard-list me-1"></i>Board
                  </button>

                  <button class="btn btn-link me-1" data-mdb-ripple-color="dark" type="button">
                    MDB board
                  </button>

                  <button class="btn btn-outline-primary me-1 px-2" data-mdb-ripple-color="dark" type="button">
                    <i class="fas fa-star"></i>
                  </button>

                  <button class="btn btn-outline-primary me-1" data-mdb-ripple-color="dark" type="button">
                    <i class="fas fa-users me-2"></i>Team
                  </button>

                  <a href="">
                    <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" class="border rounded-circle" alt=""
                      style="height: 30px" />
                  </a>

                  <a href="">
                    <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="border rounded-circle" alt=""
                      style="height: 30px" />
                  </a>

                  <a href="">
                    <img src="https://mdbootstrap.com/img/new/avatars/3.jpg" class="border rounded-circle" alt=""
                      style="height: 30px" />
                  </a>

                  <a href="">
                    <img src="https://mdbootstrap.com/img/new/avatars/4.jpg" class="border rounded-circle" alt=""
                      style="height: 30px" />
                  </a>

                  <a href="">
                    <img src="https://mdbootstrap.com/img/new/avatars/5.jpg" class="border rounded-circle" alt=""
                      style="height: 30px" />
                  </a>
                  <button type="button" class="btn btn-outline-primary btn-floating btn me-1" style="height: 30px; width: 30px">
                    +2
                  </button>

                  <button class="btn btn-outline-primary me-1" data-mdb-ripple-color="dark" type="button">
                    <i class="fas fa-user-plus me-2"></i>Invite
                  </button>
                </div>
                <!-- Left elements -->

                <!-- Right elements -->
                <div>
                  <button class="btn btn-outline-primary" data-mdb-ripple-color="dark" type="button">
                    <i class="fas fa-concierge-bell me-1"></i>Tips
                  </button>
                  <button class="btn btn-outline-primary" data-mdb-ripple-color="dark" type="button">
                    <i class="fas fa-bars me-2"></i>Show menu
                  </button>
                </div>
                <!-- Right elements -->
              </div>
              <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
          </header>
          <!--Main Navigation-->
