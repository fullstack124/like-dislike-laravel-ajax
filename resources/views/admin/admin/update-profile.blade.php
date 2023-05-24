@extends('layouts.app')
@section('title')
    View Sale
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>Profile</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery__area bg-style">
                        <div class="gallery__content">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-one" role="tabpanel"
                                    aria-labelledby="nav-one-tab">
                                    <div class="row ">
                                        <div class="col-md-6 {{ Auth::user() && Auth::user()->role != 1 ? 'd-none' : '' }} ">
                                            <form enctype="multipart/form-data" method="POST" id="update_profile">
                                                @csrf
                                                <div class="form-vertical__item bg-style">
                                                    <div class="item-top mb-30">
                                                        <h2>Edit Profile</h2>
                                                    </div>
                                                    <div class="input__group mb-25">
                                                        <label for="exampleInputEmail1">Admin Name</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ Auth::user()->name }}" required>
                                                    </div>
                                                    <div class="input__group mb-25">
                                                        <label for="exampleInputEmail1">Admin Email</label>
                                                        <input type="text" class="form-control" id="email"
                                                            name="email" value="{{ Auth::user()->email }}" required>
                                                    </div>
                                                    <div class="input__button">
                                                        <button type="submit" id="button_submit"
                                                            class="btn btn-blue d-flex justify-content-center align-items-center">
                                                            <div class="spinner-border text-info" id="loading"
                                                                role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                            <span id="submit">Update</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div
                                            class="{{ Auth::user() && Auth::user()->role == 1 ? 'col-md-6' : 'col-md-12' }}">
                                            <form enctype="multipart/form-data" method="POST"
                                                id="{{ Auth::user() && Auth::user()->role != 1 ? 'user_change_password' : 'change_password' }}">
                                                @csrf
                                                <div class="form-vertical__item bg-style">
                                                    <div class="item-top mb-30">
                                                        <h2>Change Password</h2>
                                                    </div>
                                                    <div class="input__group mb-25">
                                                        <label for="exampleInputEmail1">Current Password</label>
                                                        <input type="password" class="form-control" id="current_password"
                                                            name="old_password" />
                                                    </div>
                                                    <div class="input__group mb-25">
                                                        <label for="exampleInputEmail1">New Password</label>
                                                        <input type="password" class="form-control" id="new_password"
                                                            name="password" />
                                                    </div>
                                                    <div class="input__group mb-25">
                                                        <label for="exampleInputEmail1">Confirm Password</label>
                                                        <input type="password" class="form-control" id="confirm_password"
                                                            name="password_confirmation" />
                                                    </div>
                                                    <div class="input__button">
                                                        <button type="submit" id="button_submit1"
                                                            class="btn btn-blue d-flex justify-content-center align-items-center">
                                                            <div class="spinner-border text-info" id="loading1"
                                                                role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                            <span id="submit1">Update</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $("#loading").css({
                display: 'none'
            });
            $("#loading1").css({
                display: 'none'
            });

            $("#update_profile").on('submit', function(e) {
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
                    url: "{{ route('admin.update.profile') }}",
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    jsonType: 'json',
                    success: function(data) {
                        if (data.success) {
                            data.message.forEach(val => {
                                toastr["success"](val)
                            });
                            window.location.href = "{{ route('admin.admin.profile_view') }}";

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
            $("#change_password").on('submit', function(e) {
                e.preventDefault();

                $("#button_submit1").attr({
                    disabled: true
                })
                $("#loading1").css({
                    display: 'flex'
                })
                $("#submit1").css({
                    display: 'none'
                })
                const formdata = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.change.password') }}",
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    jsonType: 'json',
                    success: function(data) {
                        if (data.success) {
                            data.message.forEach(val => {
                                toastr["success"](val)
                            });
                            window.location.href = "{{ route('admin.admin.profile_view') }}";

                        } else {
                            data.message.forEach(val => {
                                toastr["error"](val)
                            });
                        }
                        $("#button_submit1").attr({
                            disabled: false
                        })
                        $("#loading1").css({
                            display: 'none'
                        })
                        $("#submit1").css({
                            display: 'flex'
                        })
                    }
                })
            })

            $("#user_change_password").on('submit', function(e) {
                e.preventDefault();

                $("#button_submit1").attr({
                    disabled: true
                })
                $("#loading1").css({
                    display: 'flex'
                })
                $("#submit1").css({
                    display: 'none'
                })
                const formdata = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.user.change.password') }}",
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    jsonType: 'json',
                    success: function(data) {
                        if (data.success) {
                            data.message.forEach(val => {
                                toastr["success"](val)
                            });
                            window.location.href = "{{ route('admin.user.profile_view') }}";

                        } else {
                            data.message.forEach(val => {
                                toastr["error"](val)
                            });
                        }
                        $("#button_submit1").attr({
                            disabled: false
                        })
                        $("#loading1").css({
                            display: 'none'
                        })
                        $("#submit1").css({
                            display: 'flex'
                        })
                    }
                })
            })
        });



        // $(document).on('click','#remove_field',function() {

        // function removeField(button){
        //     console.log(button.closest('#service'))
        //     $(button).closest('#service').remove();
        // }
        // $(this).remove();
        // });
    </script>
@endsection
