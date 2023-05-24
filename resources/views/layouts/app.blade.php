<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Sale</title>

    <link rel="shortcut icon" href="https://cdn.pixabay.com/photo/2019/04/26/07/14/store-4156934_640.png"
        type="image/x-icon">

    <link rel="apple-touch-icon" href="https://cdn.pixabay.com/photo/2019/04/26/07/14/store-4156934_640.png">

    <link rel="stylesheet" href="{{ asset('admin/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link href="{{ asset('admin/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/summernote-bs4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/image-preview.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/summernote.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/summernote-lite.min.css') }}">
    <link href="{{ asset('admin/css/extra.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/cookie-consent.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
</head>

<body>

    <div class="sidebar__area">
        <div class="sidebar__close">
            <button class="close-btn">
                <i class="fa fa-close"></i>
            </button>
        </div>
        <div class="sidebar__brand">
            <a href="admin/dashboard">
                {{-- <img src="uploaded_files/logo/footer-logo.png" alt="icon"> --}}
                {{-- <h3>Sale </h3> --}}
            </a>
        </div>
        <ul id="sidebar-menu" class="sidebar__menu">
            @if (Auth::user() && Auth::user()->role == 1)
                <li class="{{ Request::routeIs('admin.dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa-solid fa-gauge"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @else
                <li class="{{ Request::routeIs('admin.user.dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.user.dashboard') }}">
                        <i class="fa-solid fa-gauge"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif

            @super_admin
                <li
                    class="{{ Request::routeIs('admin.user.index' || 'admin.user.create' || 'admin.user.edit') ? 'mm-active' : '' }}">
                    <a class="has-arrow">
                        <i class="fas fa-user"></i>
                        <span>Manage User</span>
                    </a>
                    <ul>
                        <li class="{{ Request::routeIs('admin.user.index') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.user.index') }}">
                                <i class="fa fa-circle"></i>
                                <span>User List</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('admin.user.create') ? 'mm-active' : '' }}">
                            <a href=" {{ route('admin.user.create') }}">
                                <i class="fa fa-circle"></i>
                                <span>Add User</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endsuper_admin

            @sale_and_admin
                <li
                    class="{{ Request::routeIs('admin.lead.index' || 'admin.lead.create' || 'admin.lead.edit') ? 'mm-active' : '' }}">
                    <a class="has-arrow">
                        <i class="fa-solid fa-pencil"></i>
                        <span>Lead create</span>
                    </a>
                    <ul>
                        @if (Auth::user()->role != 1)
                            <li class="{{ Request::routeIs('admin.lead.index') ? 'mm-active' : '' }}">
                                <a href="{{ route('admin.lead.index') }}">
                                    <i class="fa fa-circle"></i>
                                    <span>Lead List</span>
                                </a>
                            </li>
                        @else
                            <li class="{{ Request::routeIs('admin.admin.lead.index') ? 'mm-active' : '' }}">
                                <a href="{{ route('admin.admin.lead.index') }}">
                                    <i class="fa fa-circle"></i>
                                    <span>Lead List</span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->role != 1)
                            <li class="{{ Request::routeIs('admin.user.create') ? 'mm-active' : '' }}">
                                <a href=" {{ route('admin.lead.create') }}">
                                    <i class="fa fa-circle"></i>
                                    <span>Add Lead</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li
                    class="{{ Request::routeIs('admin.lead.index' || 'admin.lead.create' || 'admin.lead.edit') ? 'mm-active' : '' }}">
                    <a class="has-arrow">
                        <i class="fa-solid fa-universal-access"></i>
                        <span>Sale</span>
                    </a>
                    <ul>
                        @if (Auth::user()->role != 1)
                            <li class="{{ Request::routeIs('admin.sale.index') ? 'mm-active' : '' }}">
                                <a href="{{ route('admin.sale.index') }}">
                                    <i class="fa fa-circle"></i>
                                    <span>Sale List</span>
                                </a>
                            </li>
                        @else
                            <li class="{{ Request::routeIs('admin.admin.sale.index') ? 'mm-active' : '' }}">
                                <a href="{{ route('admin.admin.sale.index') }}">
                                    <i class="fa fa-circle"></i>
                                    <span>Sale List</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endsale_and_admin

        </ul>
    </div>

    <div class="main-content">
        <div class="page-content-wrap">
            <header class="header__area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header__navbar">
                                <div class="header__navbar__left">
                                    <button class="sidebar-toggler">
                                        <img src="{{ asset('admin/images/icons/bars.svg') }}" alt="">
                                    </button>
                                </div>
                                <div class="header__navbar__right">
                                    <ul class="header__menu">
                                        <li>
                                            <a href="#" class="btn btn-dropdown user-profile"
                                                data-bs-toggle="dropdown">
                                                {{ Auth::user()->name }}
                                                <img src="https://cdn.pixabay.com/photo/2013/07/13/10/07/man-156584_640.png"
                                                    alt="icon">
                                            </a>
                                            <ul class="dropdown-menu">
                                                @if (Auth::user() && Auth::user()->role == 1)
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.admin.profile_view') }}">
                                                            <img src="{{ asset('admin/images/icons/users.svg') }}"
                                                                alt="icon">
                                                            <span>Profile</span>
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.user.profile_view') }}">
                                                            <img src="{{ asset('admin/images/icons/users.svg') }}"
                                                                alt="icon">
                                                            <span>Change Password</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        data-bs-toggle="modal" data-bs-target="#logoutModal">
                                                        <img src="https://cdn.pixabay.com/photo/2017/05/29/23/02/logging-out-2355227_1280.png"
                                                            alt="icon">
                                                        <span>Logout</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            @yield('content')

            <footer class="footer__area" style='    position: fixed;
    bottom: 1px;
    width: 100%;'>
                <div class="container-fluid"
                    style='display: flex;
    align-items: center;
    justify-content: start;'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer__copyright">
                                <div class="footer__copyright__left">
                                    <h2>{{ \Carbon\Carbon::now()->format('Y') }} &copy;Copyright </h2>
                                </div>
                                <div class="footer__copyright__right">
                                    <!--<h2>Designed &amp; Developed By Hilal ahmad</h2>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary me-2"
                        data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route('admin.logout') }}" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('admin/js/summernote-init.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/data-table-page.js') }}"></script>
    <script src="{{ asset('admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/js/image-preview.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script src="{{ asset('admin/js/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('admin/js/toastr.min.js') }}"></script>

    <script src="{{ asset('admin/js/sweetalert.all.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        // $("textarea").summernote({
        //     placeholder: 'Description',
        //     height: 300,
        // });
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>

    @yield('footer')
</body>

</html>
