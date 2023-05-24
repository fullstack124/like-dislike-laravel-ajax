<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale</title>

    <link rel="shortcut icon" href="https://cdn.pixabay.com/photo/2019/04/26/07/14/store-4156934_640.png" type="image/x-icon">

    <link rel="apple-touch-icon" href="https://cdn.pixabay.com/photo/2019/04/26/07/14/store-4156934_640.png">

    <link rel="stylesheet" href="{{ asset('admin/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/styles/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="main-content__area bg-img">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="authentication__item">
                        <div class="authentication__item__logo">
                        </div>
                        <div class="authentication__item__title mb-30">
                            <h2>Sign In</h2>
                        </div>
                        <div class="authentication__item__content">
                            <form id="admin_login" method="post">
                                @csrf
                                <div class="input__group mb-25">
                                    <label>Email Address</label>
                                    <div class="input-overlay"> 
                                        <input type="text" name="email" id="email"
                                            placeholder="Enter email address">
                                            <div class="overlay">
<img src="{{ asset('admin/images/icons/mail.svg') }}" alt="icon">
</div>
                                    </div>
                                </div>
                                <div class="input__group mb-20">
                                    <label>Password</label>
                                    <div class="input-overlay">
                                        <input type="password" name="password" id="pass"
                                            placeholder="Enter password">
                                        <div class="overlay">
                                            <img src="{{ asset('admin/images/icons/lock.svg') }}" alt="icon">
                                        </div>
                                        <div class="password-visibility">
                                            <img src="{{ asset('admin/images/icons/eye.svg') }}" alt="icon">
                                        </div>
                                    </div>
                                </div>
                                <div class="input__group mb-27">
                                    <button type="submit" id="button_submit"
                                        class="btn btn-blue d-flex justify-content-center align-items-center">
                                        <div class="spinner-border text-info" id="loading" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <span id="submit">Sign In</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}"></script>
    <scrit src="{{ asset('admin/js/popper.min.js') }}"></scrit>
    <scrit src="{{ asset('admin/js/toastr.min.js') }}"></scrit>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/password-show.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
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
        }



        $(document).ready(function() {

            $("#loading").css({
                display: 'none'
            })

            $("#admin_login").on('submit', function(e) {
                e.preventDefault();

                $("#button_submit").attr({
                    disabled: true
                })
                $("#loading").css({
                    display: 'flex'
                })
                $("#submit").css({
                    display: 'none'
                })
                const formdata = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.make.login') }}",
                    method: 'POST',
                    data: formdata,
                    jsonType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.success) {
                            data.message.forEach(val => {
                                toastr["success"](val)
                            });
                            window.location.href = "{{ route('admin.dashboard') }}";
                        } else {
                            data.message.forEach(val => {
                                toastr["error"](val)
                            });
                        }
                        $("#button_submit").attr({
                            disabled: false
                        })
                        $("#loading").css({
                            display: 'none'
                        })
                        $("#submit").css({
                            display: 'flex'
                        })
                    }
                })
            })
        })
    </script>
</body>

</html>
