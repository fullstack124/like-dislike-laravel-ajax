@extends('layouts.app')
@section('title')
    User
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>User List</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User</li>
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
                                <a href="{{ route('admin.user.create') }}" class="btn btn-md btn-info">Add
                                    User</a>
                            </div>
                        </div>
                        <div class="customers__table">
                            <table id="admin_list" class="row-border data-table-filter table-style">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @php
                                                    if ($user->role == 1) {
                                                        echo 'Super User';
                                                    } elseif ($user->role == 2) {
                                                        echo 'Sale';
                                                    } elseif ($user->role == 3) {
                                                        echo 'Designer';
                                                    } elseif ($user->role == 4) {
                                                        echo 'Production';
                                                    } elseif ($user->role == 5) {
                                                        echo 'Shipping';
                                                    }
                                                @endphp
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="action__buttons">
                                                    <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"
                                                        class="btn-action">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="{{ route('admin.user.delete', ['id' => $user->id]) }}"
                                                        class="btn-action delete" data-id="{{ $user->id }}"
                                                        id="delete_admin">
                                                        <i class="fas fa-trash-alt"></i>
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
                        url: "{{ route('admin.user.delete') }}",
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
    </script>
@endsection
