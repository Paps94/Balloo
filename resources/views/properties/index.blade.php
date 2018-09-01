@extends('layouts.app')

@section('content')

<!-- Page-->
<div class="page text-center text-xl-left">
  <!-- Page Content-->
  <!-- Section Title Breadcrumbs-->
  <section class="section-full">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1>Property Gallery</h1>
          <p></p>
          <div id="cssmenu">
            <ul>
              <li class="active"><a>My Properties</a></li>
              <li><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Section Isotop-->
  <section class="section-md">
    <div class="container">
      <h2>List of registered properties</h2>
      <hr>
      <p>Add new property</p>
      <a class="btn btn-warning btn-warning-transparent btn-md btn-min-width-lg" style="font-family:'Raleway'" href="/properties/create">Add new property</a>
      </br>
      <hr>
      <p>Choose a display option</p>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="btn-group-isotope">
              <button class="btn btn-primary btn-shadow-1 btn-primary-transparent btn-sm btn-block btn-min-width-sm" data-isotope-filter="*" data-isotope-group="gallery">All</button>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="btn-group-isotope">
              <button class="btn btn-primary btn-shadow-1 btn-primary-transparent btn-sm btn-block btn-min-width-sm" data-isotope-filter="Available" data-isotope-group="gallery"> Available</button>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="btn-group-isotope">
              <button class="btn btn-primary btn-shadow-1 btn-primary-transparent btn-sm btn-block btn-min-width-sm" data-isotope-filter="Under Contract" data-isotope-group="gallery"> Under Contract</button>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="btn-group-isotope">
              <button class="btn btn-primary btn-shadow-1 btn-primary-transparent btn-sm btn-block btn-min-width-sm" data-isotope-filter="Under Construction" data-isotope-group="gallery"> Under Construction</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-md text-center text-md-left">
    <div class="container">
      <div class="isotope row row-45 row-md-60 clearleft-custom" data-isotope-group="gallery" data-lightbox="gallery">
        @foreach ($properties as $property)
        <div class="isotope-item col-sm-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".2s" data-filter="{{$property-> Condition}}">
          <div class="thumbnail"><a class="img-link" href="/properties/{{$property-> id}}"><img src="{{ asset('image/properties/default.jpg') }}" alt="" width="370" height="250"/><span class="thumbnail-price">£{{$property-> PricePerWeek}}.00/<span class="mon">week</span></span></a>
            <div class="row">
              <div class="col-md-12">
                <h4><a href="/properties/{{$property-> id}}">{{$property-> Address}}<span> {{$property-> PostalCode}}</span></a></h4>
              </div>
              <div class="col-md-6 col-sm-6" style="padding:0 5px 0 5px;">
                <ul class="describe-1">
                  <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/contract.svg') }}" class="svgIMG"/></span></span>{{$property-> Condition}}</li>
                  <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/bathtub.svg') }}" class="svgIMG"/></span></span>{{$property-> NumberOfBathrooms}} bathroom(s)</li>
                </ul>
              </div>
              <div class="col-md-6 col-sm-6">
                <ul class="describe-2">
                  <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/bed.svg') }}" class="svgIMG1"/></span></span>{{$property-> NumberOfBedrooms}} bedroom(s)</li>
                  <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/kitchen.svg') }}" class="svgIMG1"/></span></span>{{$property-> NumberOfKitchens }} kitchen(s)</li>
                </ul>
              </div>
              <div class="col-md-12" style="margin-top: 25px;">
                <p>{{$property-> Description }}</p>
              </div>
          </div>
        </div>
      </div>

    @endforeach
    </div>
  </div>
    {{-- Use in the build in links() method to create the different pages --}}
    {{$properties->links()}}
  </section>

  <!-- Page Footer-->
  <footer class="page-foot text-center text-lg-left bg-gray">
    <div class="container-fluid">
      <div class="footer-wrap">
        <div class="rd-navbar-brand wow fadeInUp" data-wow-delay=".2s"><a class="brand-name" href="{{ url('home') }}"><img src="image/logo-gray-139x37.png" width="139" height="37" alt=""></a></div>
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
</div>

@endsection
