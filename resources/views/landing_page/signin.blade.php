@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width: 800px;">
        <div class="col-xl-12 col-lg-12 col-md-10 col-sm-10">
            <div class="card card-custom shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img class="img-fluid" src="https://merakiui.com/images/logo.svg" alt="" style="height: 2rem;">
                    </div>

                    <h3 class="mt-3 text-center">Welcome Back</h3>
                    <p class="mt-1 text-center text-muted">Login to your account</p>

                    <form>
                        <div class="form-group mt-4">
                            <input type="email" class="form-control" placeholder="Email" aria-label="Email">
                        </div>

                        <div class="form-group mt-4">
                            <input type="password" class="form-control" placeholder="Password" aria-label="Password">
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button class="btn btn-primary col-12">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center bg-light">
                    <span class="text-muted">Don't have an account? </span>
                    <a href="{{ route('sign-up') }}" class="font-weight-bold text-primary">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
