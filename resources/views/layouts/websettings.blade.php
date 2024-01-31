@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card bg-light text-dark">

                    <div class="card-body">
                        <div class="card-header mb-5 text-info text-opacity-75">
                            <h4>{{ __('Web Settings') }}</h4>
                        </div>

                        <form method="POST" action="{{ url('update-settings') }}" enctype="multipart/form-data">
                            @csrf
                            @if (session('messages'))
                                <div id="successMessage" class="alert alert-success">
                                    {{ session('messages') }}
                                </div>
                            @endif
                            <div class="row mb-3">
                                <label for="logo" class="col-md-4 col-form-label text-md-end">{{ __('Logo') }}
                                    <img src="{{ asset('assets/images/logos/' . $websettings->logo) }}" width="180"
                                        alt="logo" />
                                </label>

                                <div class="col-md-6">
                                    <input id="logo" type="file" accept="image/png" class="form-control"
                                        value="{{ $websettings->logo }}" name="logo">

                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="web_title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Web title') }}</label>

                                <div class="col-md-6">
                                    <input id="webtitle" type="text" class="form-control"
                                        value="{{ $websettings->webtitle }}" name="webtitle">

                                    @error('webtitle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="footer"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Footer') }}</label>

                                <div class="col-md-6">
                                    <input id="footer" type="text" class="form-control"
                                        value="{{ $websettings->footer }}" name="footer">

                                    @error('footer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="favcon" class="col-md-4 col-form-label text-md-end">{{ __('favcon') }}
                                    <img src="{{asset('assets/images/favcon/'.$websettings->favcon) }}"alt="" width="30" height="30"
                                        class="rounded-circle">
                                </label>

                                <div class="col-md-6">
                                    <input id="favcon" type="file"
                                        class="form-control @error('favcon') is-invalid @enderror"
                                        value="{{ $websettings->favcon }}" name="favcon">

                                    @error('favcon')
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
@endsection
