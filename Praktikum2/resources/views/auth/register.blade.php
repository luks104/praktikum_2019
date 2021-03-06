@extends('layouts.mainLayout')

@section('content')
<div class="container">
        <div class="row">
                <div class="col s12 l6 offset-l3 z-depth-3 card-panel m8 offset-m2 gradient-border" style="margin-top:5em;">                 
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                          <div class="row center-align">
                                <h4 class="ff-opensans">Register</h4>
                                <p class="ff-opensans"> Become a member and create templates...</p>
                          </div>
                          
                          <div class="row">
                            <div class="input-field col s8 offset-s2">
                              <i class="material-icons prefix">account_circle</i>
                              <input id="name" type="text" class="validate @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name  " autofocus>
                              <label for="name" data-error="wrong" data-success="right">Name</label>
                                @error('name')
                                <span class="helper-text red-text">{{$message}}</span>
                                @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s8 offset-s2">
                              <i class="material-icons prefix">mail_outline</i>
                              <input id="email" type="email" class="validate @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              <label for="email" data-error="wrong" data-success="right">Email</label>
                                @error('email')
                                <span class="helper-text red-text">{{$message}}</span>
                                @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s8 offset-s2">
                              <i class="material-icons prefix">lock_outline</i>
                              <input id="password" type="password" class="validate @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                              <label for="password">Password</label>
                                @error('password')
                                <span class="helper-text text-red">{{$message}}</span>
                                @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s8 offset-s2">
                              <i class="material-icons prefix">lock_outline</i>
                              <input id="passwordConfirm" type="password" class="validate @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                              <label for="passwordConfirm">Confirm Password</label>
                            </div>
                          </div>
                          <div class="row center-align">
                                <div class="col l12 s10 offset-s1 m10 offset-m1">
                                    <button type="submit" class="btn-large btn bgStill" style="background-color:#08AEEA">Register</button>
                                </div>
                          </div>
                    </form>
                </div>
            </div>
</div>
@endsection
