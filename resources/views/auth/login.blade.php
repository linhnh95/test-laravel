@extends('master')

@section('title', 'Login')

@section('content')
    <div class="login mt-4">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Login</h2>
                <form method="POST" action="{{route('post.login')}}">
                    @csrf
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginName">Email</label>
                        <input type="email" id="loginName" name="email" class="form-control"/>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginPassword">Password</label>
                        <input type="password" id="loginPassword" name="password" class="form-control"/>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 d-flex">
                            <!-- Checkbox -->
                            <div class="form-check mb-3 mb-md-0">
                                <input class="form-check-input" type="checkbox" name="remember" value="1" id="loginCheck"
                                       checked/>
                                <label class="form-check-label" for="loginCheck"> Remember me </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                </form>
            </div>
        </div>
    </div>
@endsection
