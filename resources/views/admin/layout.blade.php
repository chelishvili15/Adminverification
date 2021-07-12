<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>@yield('title')</title>
        @yield('style')
        <link href="{{ asset('assets/admin/css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            
            <!-- ბრენდის ადგილი -->
            <a class="navbar-brand ps-3" href="{{ route('AdminMainPage') }}">Laravel</a>
            
            <!-- მენიუს გადამრთველი -->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class="fas fa-bars"></i>
            </button>
            
            <!-- ზედა მენიუ -->
            <ul class="navbar-nav d-md-inline-block ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('AdminMainPage') }}">მთავარი</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('AdminLogout') }}">გასვლა</a></li>
                    </ul>
                </li>
            </ul>
            
        </nav>
        
        <div id="layoutSidenav">
            
             <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        
                        <!-- გვერდითი მენიუ -->
                        <div class="nav">
                            <a class="nav-link" href="{{ route('AdminMainPage') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                მთავარი
                            </a>
                            <a class="nav-link" href="{{ route('admins.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                ადმინისტრატორები
                            </a>
                            <a class="nav-link" href="{{ route('contacts.edit', 1) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-phone"></i></div>
                                საკონტაქტო ინფორმაცია
                            </a>
                        </div>
                        
                    </div>
                    
                    <div class="sb-sidenav-footer">
                        <div class="small">გამარჯობა {{ Session::get('admin')->name }}</div>
                    </div>
                    
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
                
                <main>
                    
                    <!-- ძირითადი შიგთავსი -->
                    @yield('content')
                    
                </main>
                
                <!-- ძირი -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">© 2021</div>
                            <div>
                                <a href="{{ route('AdminMainPage') }}">ადმინსტრატორის პანელი</a>
                            </div>
                        </div>
                    </div>
                </footer>
                
            </div>
            
        </div>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
        @yield('script')
        
    </body>
</html>