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

    <div class="card-panel white z-depth-4" style="padding:1em;margin:0;margin-bottom:2em;margin-top:2em">
        <div class="row valign-wrapper center-align" style="margin:0;">
          <div class="col l1" style="border-right:1px solid #576071">
              <i class="medium material-icons myBlue">insert_chart</i>
          </div>
          <div class="col l11">
            <p class="ff-poppins">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse vero illum inventore mollitia fugit sapiente! Voluptates illum nihil assumenda. Fugit quis nostrum, minus assumenda ad voluptatum placeat laboriosam perferendis suscipit.</p>
          </div>
        </div>
    </div>

    <div class="card-panel white z-depth-4" style="padding:1em;margin:0;margin-bottom:2em;margin-top:2em">
        <div class="row valign-wrapper center-align" style="margin:0;">
          <div class="col l1" style="border-right:1px solid #576071">
              <i class="medium material-icons myBlue">edit</i>
          </div>
          <div class="col l11">
            <p class="ff-poppins">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse vero illum inventore mollitia fugit sapiente! Voluptates illum nihil assumenda. Fugit quis nostrum, minus assumenda ad voluptatum placeat laboriosam perferendis suscipit.</p>
          </div>
        </div>
    </div>

    <div class="card-panel white z-depth-4" style="padding:1em;margin:0;margin-bottom:2em;margin-top:2em">
        <div class="row valign-wrapper center-align" style="margin:0;">
          <div class="col l1" style="border-right:1px solid #576071">
              <i class="medium material-icons myBlue">insert_drive_filet</i>
          </div>
          <div class="col l11">
            <p class="ff-poppins">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse vero illum inventore mollitia fugit sapiente! Voluptates illum nihil assumenda. Fugit quis nostrum, minus assumenda ad voluptatum placeat laboriosam perferendis suscipit.</p>
          </div>
        </div>
    </div>
    
  </div>
</div>
<footer class="page-footer footerino">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Footer Content</h5>
          <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2014 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>

@endsection
