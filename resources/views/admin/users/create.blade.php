@extends('layouts.app')


@section('title')
    Add User
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>Add User</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">User</li>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-vertical__item bg-style">
                                                <form enctype="multipart/form-data" method="POST" id="create_admin">
                                                    @csrf
                                                    <div class="input__group mb-25">
                                                        <label for="name">Name</label>
                                                        <input type="text" id="name" name="name" value=""
                                                            placeholder="Name">
                                                    </div>
                                                    <div class="input__group mb-25">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" name="email" value=""
                                                            placeholder="Email">
                                                    </div>
                                                    <div class="input__group mb-25">
                                                        <label for="password">Password</label>
                                                        <input type="password" id="password" name="password" value=""
                                                            placeholder="Password">
                                                    </div>
                                                    <div class="input__group mb-25">
                                                        <label for="confirm-password">Confirm Password</label>
                                                        <input type="password" id="password_confirmation"
                                                            name="password_confirmation" placeholder="Confirm Password">
                                                    </div>
                                                    <div class="input__group mb-25">
                                                        <label for="role">Role</label>
                                                        <select name="role" id="role" class="tag_one">
                                                            <option value="">Select Role</option>
                                                            <option value="2">Sale</option>
                                                            <option value="3">Designer</option>
                                                            <option value="4">Production</option>
                                                            <option value="5">Shipping</option>
                                                        </select>
                                                    </div>
                                                    <div class="input__group mb-27">
                                                        <button type="submit" id="button_submit"
                                                            class="btn btn-blue d-flex justify-content-center align-items-center">
                                                            <div class="spinner-border text-info" id="loading"
                                                                role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                            <span id="submit">Submit</span>
                                                        </button>
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
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function() {

            $("#loading").css({
                display: 'none'
            })

            $("#create_admin").on('submit', function(e) {
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
                    url: "{{ route('admin.user.store') }}",
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
                            window.location.href = "{{ route('admin.user.index') }}";
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
@endsection
