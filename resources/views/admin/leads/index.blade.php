@extends('layouts.app')
@section('title')
    View Leads
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>View List</h2>
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
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title">
                            <div class="col-xs-6">
                                <a href="{{ route('admin.lead.create') }}" class="btn btn-md btn-info">Add
                                    Lead</a>
                            </div>
                        </div>
                        <div class="customers__table">
                            <table id="admin_list" class="row-border data-table-filter table-style">
                                <thead>
                                    <tr>
                                        <th>Id</th> 
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th>Follow Up</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leads as $lead)
                                        <tr>
                                            <td>{{ $lead->id }}</td>
                                            <td>{{ $lead->full_name }}</td>
                                            <td>{{ $lead->email }}</td>
                                            <td>{{ $lead->contact_no }}</td>
                                            <td>{{ $lead->product_name }}</td>
                                            <td>{{ $lead->status }}</td>
                                            <td><a href="{{ route('admin.lead.follow_up_view',['id'=>$lead->id]) }}" class="nav-link">Add Follow Up</a></td>
                                            <td>
                                                <div class="action__buttons">
                                                    @if(Auth::user()->role != 1)
                                                    <a href="{{ route('admin.lead.edit', ['id' => $lead->id]) }}"
                                                        class="btn-action">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    @endif
                                                    
                                                    <a href="{{ route('admin.lead.delete', ['id' => $lead->id]) }}"
                                                        class="btn-action delete" data-id="{{ $lead->id }}"
                                                        id="delete_admin">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a href="{{ route('admin.lead.delete', ['id' => $lead->id]) }}"
                                                        class="btn-action btn-success btn-sm" data-id="{{ $lead->id }}"
                                                        id="confirm_salte"> Confirm Sale</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
            $('#admin_list').DataTable();
        });

        $(document).on('click', '#delete_admin', function(e) {

            const id = $(this).data('id');
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.lead.delete') }}",
                        method: 'POST',
                        jsonType: 'json',
                        data: {
                            id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: (data) => {
                            if (data.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                window.location.reload();
                            }

                        }
                    })

                }
            })
        })

        $(document).on('click', '#confirm_salte', function(e) { 
            const id = $(this).data('id');
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to add to sale",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Confirm it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.lead.confirm_sale') }}",
                        method: 'POST',
                        jsonType: 'json',
                        data: {
                            id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: (data) => {
                            if (data.success) {
                                Swal.fire(
                                    'Confirm!',
                                    'Your file has been Confirm to sale.',
                                    'success'
                                )
                                window.location.reload();
                            }

                        }
                    })

                }
            })
        })
    </script>
@endsection
