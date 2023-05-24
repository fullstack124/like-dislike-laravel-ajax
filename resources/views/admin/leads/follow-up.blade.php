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
                                {{-- <h2>Add Lead</h2> --}}
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.lead.index') }}">Leads</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Follow Up</li>
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
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-12 col-sm-12" >
                                                            @foreach ($follows as $follow)
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <h3>Follow Up {{ $follow->id }}</h3>
                                                                <h3>Date : {{ \Carbon\Carbon::now()->format('Y-m-d',strtotime($follow->created_at)) }}</h3> 
                                                            </div>
                                                            <div class="my-4 ">
                                                                <p class="ml-3">
                                                                    {{ $follow->message }}
                                                                </p>
                                                            </div>
                                                            @endforeach
                                                          
                                                            {{ $follows->links() }}
                                                        </div>
                                                        <div class="col-xl-6 col-md-12 col-sm-12">
                                                            <form action="" id="add_follow" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="input__group mb-25">
                                                                        <label>Add Follow Up</label>
                                                                        <input type="hidden" name="id" value="{{ $id }}" id="">
                                                                        <textarea id="message" name="message"  cols="30" rows="10"></textarea>
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
        </div>
    </div>
@endsection


@section('footer')
    <script>
        $(document).ready(function() {
            $('#follow_list').DataTable();
        });
        $(document).ready(function() {
            $("#loading").css({
                display: 'none'
            });

            $("#add_follow").on('submit', function(e) {
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
                    url: "{{ route('admin.lead.add_follow') }}",
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
                            window.location.href = "{{ route('admin.lead.follow_up_view',['id'=>$id]) }}";

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

       

        // $(document).on('click','#remove_field',function() {

        // function removeField(button){
        //     console.log(button.closest('#service'))
        //     $(button).closest('#service').remove();
        // }
        // $(this).remove();
        // });
    </script>
@endsection
