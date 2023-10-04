@extends('partials.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User List</div>
                    <div>
                        <a href="{{ route('user.create') }}" style="float:right; margin-right:10px;">Create User</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-inverse">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->country->name ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $item->id) }}">Edit</a>
                                            |
                                            <a href="{{ route('user.delete', $item->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex">
                            {!! $users->links() !!}
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
