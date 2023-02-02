@extends('layout.app')
@section('content')
  <div class="container-fluid bg-1 text-center">
    <div class="container"> 
          <div class="row justify-content-center">
              <div class="col-md-4">
                  <div class="card">
                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif    
                    <a href="{{route("user.register")}}">Register</a>
                      <h3 class="card-header text-center">Login User</h3>
                      <div class="card-body">
                          <form action="{{ route('user.login.attempt') }}" method="POST">
                              @csrf
                              <div class="form-group mb-3">
                                  <input type="text" placeholder="Email" id="email_address" class="form-control"
                                      name="email">
                                  @if ($errors->has('email'))
                                  <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                              <div class="form-group mb-3">
                                  <input type="password" placeholder="Password" id="password" class="form-control"
                                      name="password">
                                  @if ($errors->has('password'))
                                  <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                              <div class="d-grid mx-auto">
                                  <button type="submit" class="btn btn-dark btn-block">Login</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection