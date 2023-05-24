@extends('layouts.app')

@section('title')
    Add Lead
@endsection

@section('content')
    <style>
        .clicked {
            color: red;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>Add Lead</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lead</li>
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
                                                <form enctype="multipart/form-data" method="POST" id="create_product">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-12 col-sm-12">
                                                            <div style="display: flex;align-items: baseline">
                                                                <h3>Details</h3>
                                                                <hr style="width: 50%">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>PlatForm</label>
                                                                        <input type="text" id="platform" name="platform"
                                                                            placeholder="PlatForm">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Customer ID</label>
                                                                        <input type="text" id="customer_id"
                                                                            name="customer_id" placeholder="Customer ID">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Full Name</label>
                                                                        <input type="text" id="full_name"
                                                                            name="full_name" placeholder="Full Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Company Name</label>
                                                                        <input type="text" id="company_name"
                                                                            name="company_name" placeholder="Company Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Contact No</label>
                                                                        <input type="text" id="contact_no"
                                                                            name="contact_no" placeholder="Contact No">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Email</label>
                                                                        <input type="text" id="email" name="email"
                                                                            placeholder="Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Your Message</label>
                                                                        <textarea id="message" name="message" placeholder="Your Message"  cols="30" rows="10"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="display: flex;align-items: baseline">
                                                                <h3>Personal Info</h3>
                                                                <hr style="width: 50%">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Product Name</label>
                                                                        <input type="text" id="product_name"
                                                                            name="product_name" placeholder="Product Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Job ID</label>
                                                                        <input type="text" id="job_id"
                                                                            name="job_id" placeholder="Job ID">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Length</label>
                                                                        <input type="text" id="length" name="length"
                                                                            placeholder="Length">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Width</label>
                                                                        <input type="text" id="width"
                                                                            name="width" placeholder="Width">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Depth</label>
                                                                        <input type="text" id="depth"
                                                                            name="depth" placeholder="Depth">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Unit</label>
                                                                        <input type="text" id="unit"
                                                                            name="unit" placeholder="Unit">
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Material</label>
                                                                        <input type="text" id="material"
                                                                            name="material" placeholder="Material">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Printing</label>
                                                                        <input type="text" id="printing"
                                                                            name="printing" placeholder="Printing">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Finishing</label>
                                                                        <input type="text" id="finishing"
                                                                            name="finishing" placeholder="Finishing">
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Please Describe Your Project</label>
                                                                        <textarea id="project" name="project" placeholder="Please Describe Your Project" cols="30" rows="10"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="input__group mb-27">
                                                                <button type="submit" id="button_submit"
                                                                    class="btn btn-blue d-flex justify-content-center align-items-center">
                                                                    <div class="spinner-border text-info" id="loading"
                                                                        role="status">
                                                                        <span class="sr-only">Loading...</span>
                                                                    </div>
                                                                    <span id="submit">Save</span>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-md-12 col-sm-12">
                                                            <div style="display: flex;align-items: baseline">
                                                                <h3>Shipping</h3>
                                                                <hr style="width: 50%">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Address 1</label>
                                                                        <input id="address1" name="address1"
                                                                            placeholder="Address 1" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Address 2</label>
                                                                        <input id="address2" name="address2"
                                                                            placeholder="Address 2" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>City</label>
                                                                        <input type="text" id="city"
                                                                            name="city" placeholder="City">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>State</label>
                                                                        <input type="text" id="state"
                                                                            name="state" placeholder="State">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Country</label>
                                                                        <input type="text" id="country"
                                                                            name="country" placeholder="Country">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="display: flex;align-items: baseline">
                                                                <h3>Tracking</h3>
                                                                <hr style="width: 50%">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-7 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Id</label>
                                                                        <input type="text" id="tracking_id"
                                                                            name="tracking_id[]" placeholder="Id">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-5 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Service</label>
                                                                        <input type="text" id="service"
                                                                            name="tracking_service[]"
                                                                            placeholder="Service">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" id="more_tracking"></div>
                                                            <button type="button" id="add_more"
                                                                class="btn btn-sm btn-success">Add
                                                                More</button>

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
    </div>
@endsection


@section('footer')
    <script>
        $(document).ready(function() {
            $("#loading").css({
                display: 'none'
            });

            $("#create_product").on('submit', function(e) {
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
                    url: "{{ route('admin.lead.store') }}",
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
                            window.location.href = "{{ route('admin.lead.index') }}";

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
        });

        $("#add_more").on('click', function() {
            let more_tracking = $("#more_tracking");
            more_tracking.append(` <div class="col-xl-6 col-md-6 col-sm-12">
                                    <div class="input__group mb-25">
                                        <label>Id</label>
                                        <input type="text" id="service"
                                            name="tracking_id[]" placeholder="Id">
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-5 col-sm-12">
                                    <div class="input__group mb-25">
                                        <label>Service</label>
                                        <input type="text" id="service" 
                                            name="tracking_service[]" placeholder="Service">
                                    </div>
                                </div>`)
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
