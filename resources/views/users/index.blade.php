@extends('layouts.app')

@section('content')

<!-- Page-->
<div class="page text-center text-xl-left">

  <!-- Page Content-->
  <!-- Section Title Breadcrumbs-->
  <section class="section-full">
    <div class="container">
      <div class="row justify-content-xl-end">
        <div class="col-sm-12 col-xl-8" style="padding-top:40px;">
          <h2 style="color:#fff">{{ Auth::user()->name }}</h2>
          <p id="profileP">Joined: {{ Auth::user()->created_at->format('l jS \\of F Y') }}</p>
          <p id="profileP1"> Last updated: {{ Auth::user()->updated_at->diffForHumans() }}</p>
          <div id="cssmenu">
            <ul>
              <li class="active"><a>My Profile</a></li>
              <li><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Section Description-->
  <section class="section-sm bg-gray-dark">
    <div class="container">
      <div class="row row-45 justify-content-center">
        <div class="col-md-6 col-lg-4 inset-8">
          <div class="img-wrap-mod-1"><img src="/image/avatars/{{ Auth::user()->avatar}}" style=" width=320px;  height=320px;" >
          <a class="btn btn-sm btn-primary btn-full-width"  style="margin-top:10px;" href="/users/{{ Auth::user()->id}}/edit">Edit Profile</a>
          </div>
          <ul class="list-unstyled list-unstyled-mod-1" style="margin-top:15px;">
            <li><span class="material-icons-smartphone icon icon-md"><a id="linksLg" href="callto:{{ Auth::user()->mobile_number }}"></span> {{ Auth::user()->mobile_number }}</a></li>
            <li><span class="material-icons-local_phone icon icon-md "><a id="linksLg" href="callto:{{ Auth::user()->phone_number }}"></span> {{ Auth::user()->phone_number }}</a></li>
            <li><span class="material-icons-drafts icon icon-md"><a id="linksEmail" href="mailto:{{ Auth::user()->email }}"></span> {{ Auth::user()->email }}</a></li>
            <li><span class="fa-birthday-cake icon icon-md"></span><span id="linksLg" style="top: -10px;">{{ Auth::user()->date_of_birth ? \Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('d/m/Y') : null}}</span></li>
          </ul>
          <ul class="list-inline">
            <li><a class="fa-facebook" href="https://www.facebook.com/antreas.papadopoulos.eklektos"></a></li>
            <li><a class="fa-linkedin" href="https://www.linkedin.com/in/antreas-papadopoulos-819891158/"></a></li>
            <li><a class="fa-google" href="#"></a></li>
          </ul>
        </div>
        <div class="col-sm-12 col-lg-8 ">
          <h4>Description</h4>
          <p>As a dedicated realtor for over 20 years, {{ Auth::user()->name }} specializes in helping clients buy and sell new and previously owned residential properties throughout the region. She gives a complete understanding on buying and selling issues to her clients.</p>
          <p>The real estate market consists of a complicated puzzle of many various pieces. She is committed to bringing all of these pieces together for a client with personal approach. Jessica can also provide accurate market appraisals, genuine advice and competent market insight. Feel free to contact her and she will happily assist you.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Page Footer-->
  <footer class="page-foot text-center text-lg-left bg-gray">
    <div class="container-fluid">
      <div class="footer-wrap">
        <div class="rd-navbar-brand wow fadeInUp" data-wow-delay=".2s"><a class="brand-name" href="index.html"><img src="image/logo-gray-139x37.png" width="139" height="37" alt=""></a></div>
        <ul class="list-inline wow fadeInUp" data-wow-delay=".4s">
          <li><a class="fa-facebook" href="#"></a></li>
          <li><a class="fa-twitter" href="#"></a></li>
          <li><a class="fa-pinterest-p" href="#"></a></li>
          <li><a class="fa-vimeo" href="#"></a></li>
          <li><a class="fa-google" href="#"></a></li>
          <li><a class="fa-rss" href="#"></a></li>
        </ul>
        <div class="copyright wow fadeInUp" data-wow-delay=".6s">
          <p>&#169;<span id="copyright-year"></span> All Rights Reserved <a href="terms.html">Terms of Use and Privacy Policy</a>
          </p>
        </div>
      </div>
    </div>
  </footer>

@endsection
