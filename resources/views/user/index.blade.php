@extends('partials.master')

@section('title', $pageTitle)

@section('content')
<div class="container-fluid">
    <div class="col-md-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>{{ $pageTitle }}</h2>
                    <small class="text-muted">{{ $subTitle }}</small>
                </div>
                <!-- Dynamic Breadcrumbs -->
                @include('partials.breadcrumb')
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Create User</a>
                </div>
                <div class="mb-3">
                    <form action="{{ route('user.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by name or email">
                            <button type="submit" class="btn btn-outline-secondary">Search</button>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-sm" data-confirm="Are you sure you want to delete {{ $user->name }}?">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('[data-confirm]');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                const confirmationMessage = button.getAttribute('data-confirm');
                if (!confirm(confirmationMessage)) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
