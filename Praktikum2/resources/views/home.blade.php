@extends('layouts.mainLayout')

@section('content')
<div class="parallax-container valign-wrapper center-align animated fadeIn">
  <div class="container">
    <div class="row">
      <div class="col l4 offset-l4 animated fadeIn">
        <div>
            <h6>
              SMART FORMS
            </h6>
        </div>
          
      </div>
    </div>
    @if(Auth::check())
    <div class="row">
        <div class="col l4 offset-l4">
            <a href="{{ route('formCreate') }}">
                <div class="card-panel transparent hoverable">
                  Create
                </div>
              </a>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col l2 offset-l4 animated fadeInLeft delay-0.5s">
            <a href="{{ route('login') }}">
                <div class="card-panel transparent hoverable">
                  Login
                </div>
              </a>
        </div>
        <div class="col l2 animated fadeInRight delay-0.5s">
          <a href="{{ route('register') }}" style="font-weight:100;">
              <div class="card-panel white-text hoverable" style="background-color:#08AEEA">
                Sign Up
              </div>
            </a>
        </div>
    </div>
    @endif
  </div>
 
  <div class="parallax"><img src="../imgs/lol.jpg"></div>
</div>

<div class="section transparent">
  <div class="container">


        <div class="row valign-wrapper center-align" style="margin:0;">
      
          <div class="col l12">
            <p class="ff-poppins"><h3> How to use Smart Forms?</h3></p>
          </div>
        </div>
   

    <div class="card-panel white z-depth-4" style="padding:1em;margin:0;margin-bottom:2em;margin-top:2em">
        <div class="row valign-wrapper center-align" style="margin:0;">
          <div class="col l1" style="border-right:1px solid #576071">
              <i class="medium material-icons myBlue">search</i>
          </div>
          <div class="col l11">
            <p class="ff-poppins"> In our collection of pre-designed forms choose the one that suits your needs and if you would like to change it, don't worry we've got you covered, Smart Forms is designed in the way, that you can modify and adjust existing forms.</p>
          </div>
        </div>
    </div>

    <div class="card-panel white z-depth-4" style="padding:1em;margin:0;margin-bottom:2em;margin-top:2em">
        <div class="row valign-wrapper center-align" style="margin:0;">
          <div class="col l1" style="border-right:1px solid #576071">
              <i class="medium material-icons myBlue">edit</i>
          </div>
          <div class="col l11">
            <p class="ff-poppins">Don't like any of existing forms? No problem, with our built-in text editor you can easily create a new form just the way you like it.</p>
          </div>
        </div>
    </div>

    <div class="card-panel white z-depth-4" style="padding:1em;margin:0;margin-bottom:2em;margin-top:2em">
        <div class="row valign-wrapper center-align" style="margin:0;">
          <div class="col l1" style="border-right:1px solid #576071">
              <i class="medium material-icons myBlue">insert_drive_filet</i>
          </div>
          <div class="col l11">
            <p class="ff-poppins">After you have succesfully inserted required data for chosen form, you can sit back and relax while Smart Forms does it's magic.</p>
          </div>
        </div>
    </div>

    <div class="card-panel white z-depth-4" style="padding:1em;margin:0;margin-bottom:2em;margin-top:2em">
        <div class="row valign-wrapper center-align" style="margin:0;">
          <div class="col l1" style="border-right:1px solid #576071">
              <i class="medium material-icons myBlue">file_download</i>
          </div>
          <div class="col l11">
            <p class="ff-poppins">The generated document can then be downloaded in various document formats and saved on your device.</p>
          </div>
        </div>
    </div>

    <div class="card-panel white z-depth-4" style="padding:1em;margin:0;margin-bottom:2em;margin-top:2em">
        <div class="row valign-wrapper center-align" style="margin:0;">
          <div class="col l1" style="border-right:1px solid #576071">
              <i class="medium material-icons myBlue">email</i>
          </div>
          <div class="col l11">
            <p class="ff-poppins">Smart Forms also allows you to send your completed form directly to desired mail address.</address></p>
          </div>
        </div>
    </div>
    
  </div>
</div>
<footer class="page-footer footerino">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Smart Forms</h5>
          <p class="grey-text text-lighten-4">Smart Forms© is an online tool that allows you to choose, create, modify various forms which can then be downloaded or sent via mail address. 
          </p>
          <p class="grey-text text-lighten-4">We designed our app the way, that it doesn't store your data, so you don't have to worry that someone is stealing or that we are selling your data, becouse after you've created and downloaded your completed form, it doesn't exist on our website anymore.
          </p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li>
              @if(Auth::check())
              <a class="grey-text text-lighten-3" href="{{ route('userIndex') }}">My profile</a>
              @else
              <a class="grey-text text-lighten-3" href="{{ route('login') }}">My profile</a>
              @endif
            </li>
            <li><a class="grey-text text-lighten-3" href="{{ route('formIndex')}}">Available templates</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Terms of use</a></li>
            <li><a class="grey-text text-lighten-3" href="{{ route ('privacyPolicy') }}">Privacy policy</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2019 Smart Forms
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>

@endsection

