@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="register-card">
            <h1>Register</h1>
            <br />

              <!-- Registration Form, POST's to Register Route -->
            <form class="form-horizontal" id="registration" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <table class="table-full">
                    <tr>
                        <td>
                            <!-- Name Input -->
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label for="name" class="col-12 control-label">Name</label>

                                  <div class="col-11">
                                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                      @if ($errors->has('name'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                        </td>
                        <td>
                            <!-- Company/Organization Name Input -->
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label for="company" class="col-12 control-label">Company or Organization</label>

                                  <div class="col-11">
                                      <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}" required autofocus>

                                      @if ($errors->has('company'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('company') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- Password Input -->
                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <label for="password" class="col-12 control-label">Password</label>

                                  <div class="col-11">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <span>Must be 6 characters long</span>
                                      @if ($errors->has('password'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif                                    
                                  </div>                          
                              </div>
                        </td>
                        <td>
                            <!-- Confirm Password Input -->
                              <div class="form-group">
                                  <label for="password-confirm" class="col-12 control-label">Confirm Password</label>

                                  <div class="col-11">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                  </div>
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- E-Mail Address Input -->
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email" class="col-12 control-label">E-Mail Address</label>

                                  <div class="col-11">
                                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                      @if ($errors->has('email'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                        </td>
                    </tr>
                </table>

                <div class="row">
                    <!-- Submit Button -->
                    <div class="form-group col-6 ml-3 mt-4">
                        <button type="submit" class="btn btn-primary submit">
                            Register
                        </button>
                    </div>

                    <!-- Agreement Checkbox -->
                    <div class="form-group{{ $errors->has('agreement') ? ' has-error' : '' }} col-5 mt-4">
                        <label for="agreement" class="form-check-label">
                            <input type="checkbox" id="agreement" class="form-check-input" name="agreement" required>
                            I have read and agree to this sites <a href="/legal/service" target="_blank">terms and policies.</a>
                        </label>
                        @if ($errors->has('agreement'))
                            <span class="help-block">
                                <strong>{{ $errors->first('agreement') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
