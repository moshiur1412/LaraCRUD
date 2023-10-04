@extends('partials.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-header">{{ isset($user) ? 'Edit User' : 'Create User' }}</div>

                    <div class="card-body">
                        <form id="itemFrom" role="form" method="POST"
                            action="{{ isset($user) ? route('user.update', $user->id) : route('user.create') }}">
                            @csrf
                            @isset($user)
                                @method('PUT')
                            @endisset

                            <div class="card-body">

                                <div class="form-group">
                                    <label class="control-label" for="name">Name: </label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="name"
                                        id="name" name="name" placeholder="full name" autofocus
                                        value="{{ old('name') }}">

                                    @error('name')
                                        <span class="invalid-feedback">
                                            <strong> {{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label class="control-label" for="email">Email: </label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        id="email" name="email" placeholder="Email address" autofocus
                                        value="{{ old('email') }}">

                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong> {{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group pt-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        @isset($user)
                                            <i class="fas fa-arrow-circle-up"></i>
                                            <span>Update</span>
                                        @else
                                            <i class="fas fa-plus-circle"></i>
                                            <span>Create</span>
                                        @endisset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
