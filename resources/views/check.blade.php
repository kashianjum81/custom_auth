@extends('layouts.master')
@section('content')
    <?php
    $users = App\Models\User::all();
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card bg-light text-dark">

                    <div class="card-body">
                        @if (auth()->user()->type == 1)
                            <div class="card-header mb-5 text-info text-opacity-75">
                                <h4>{{ __('Admin Profile') }}</h4>
                            </div>
                        @endif
                        @if (auth()->user()->type == 0)
                            <div class="card-header mb-5 text-info text-opacity-75">
                                <h4>{{ __('User Profile') }}</h4>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('profile-update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="name"
                                        value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ Auth::user()->email }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- image --}}
                            <div class="row mb-3">


                                <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}
                                    <img src="../assets/images/profile/{{ Auth::user()->image }}" alt="User Image"
                                        width="30" height="30" class="rounded-circle">
                                </label>

                                <div class="col-md-6">

                                    <input id="image" type="file"
                                        class="form-control @error('image') is-invalid @enderror" name="image"
                                        value="{{ Auth::user()->image }}">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- forget or reset password --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-2">
                <div class="card bg-light text-dark">
                    <div class="card-body">
                        <div class="card-header mb-5 text-info text-opacity-75">
                            <h4>{{ __('Forget Password') }}</h4>
                        </div>
                        <form method="POST" action="{{ route('password-update') }}">
                            @csrf

                            {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>

                                <div class="col-md-6">
                                    <input id="Current-password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="current_password"
                                        required autocomplete="Current password">

                                    @error('Current-password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password"
                                        class="form-control @error('New password') is-invalid @enderror" name="new_password"
                                        required autocomplete="new-password">

                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- reset password end --}}

    {{-- user crud for admin --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-2">
                <div class="card bg-light text-dark">
                    <div class="card-body">
                        <div class="card-header mb-5 text-info text-opacity-75">
                            <h4>{{ __('User Profile') }}</h4>
                        </div>
                        {{-- table --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Profile Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                            {{-- @dd($users) --}}
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->type }}</td>
                                            <td>{{ $user->image }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- end table --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end crud --}}
@endsection
