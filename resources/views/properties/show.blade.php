@extends('layouts.app')

@section('content')

<!-- Page-->
<div class="page text-left">
  <!-- Page Content-->
  <!-- Section Title Breadcrumbs-->
  <section class="section-full">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 style="font-family: Krona One; color: #fff;">Single Property Page</h2>
          <p></p>
          <div id="cssmenu">
            <ul>
              <li class="active"><a>Single Property</a></li>
              <li><a href="{{ url('properties') }}">My Properties</a></li>
              <li><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section Catalog Single Left-->
  <section class="section-sm bg-default">
    <div class="container">
      <div class="row row-45 row-md-60">
        <div class="col-sm-12 col-lg-8">
          <div class="product-carousel" data-lightbox="gallery">
            <!-- Slick Carousel-->
            <div class="slick-slider slider carousel-parent" data-arrows="true" data-loop="false" data-dots="false" data-swipe="true"  data-child="#child-carousel" data-for="#child-carousel">
              <div class="item"><a href="{{ asset('image/catalog_single-1_original.jpg') }}" data-lightbox="image"><img src="{{ asset('image/catalog_single-1.jpg') }}" alt="" width="770" height="520"></a></div>
              <div class="item"><a href="{{ asset('image/catalog_single-2_original.jpg') }}" data-lightbox="image"><img src="{{ asset('image/catalog_single-2.jpg') }}" alt="" width="770" height="520"></a></div>
              <div class="item"><a href="{{ asset('image/catalog_single-3_original.jpg') }}" data-lightbox="image"><img src="{{ asset('image/catalog_single-3.jpg') }}" alt="" width="770" height="520"></a></div>
              <div class="item"><a href="{{ asset('image/catalog_single-4_original.jpg') }}" data-lightbox="image"><img src="{{ asset('image/catalog_single-4.jpg') }}" alt="" width="770" height="520"></a></div>
              <div class="item"><a href="{{ asset('image/catalog_single-5_original.jpg') }}" data-lightbox="image"><img src="{{ asset('image/catalog_single-5.jpg') }}" alt="" width="770" height="520"></a></div>
              <div class="item"><a href="{{ asset('image/catalog_single-6_original.jpg') }}" data-lightbox="image"><img src="{{ asset('image/catalog_single-6.jpg') }}" alt="" width="770" height="520"></a></div>
            </div>
            <div class="carousel-thumbnail slider slick-slider" id="child-carousel" data-for=".carousel-parent" data-arrows="true" data-loop="false" data-dots="false" data-swipe="false" data-items="3" data-sm-items="3" data-md-items="5" data-lg-items="5" data-xl-items="5" data-slide-to-scroll="1" data-md-vertical="true">
              <div class="item"><img src="{{ asset('image/catalog_single-1.jpg') }}" alt="" width="770" height="520"></div>
              <div class="item"><img src="{{ asset('image/catalog_single-2.jpg') }}" alt="" width="770" height="520"></div>
              <div class="item"><img src="{{ asset('image/catalog_single-3.jpg') }}" alt="" width="770" height="520"></div>
              <div class="item"><img src="{{ asset('image/catalog_single-4.jpg') }}" alt="" width="770" height="520"></div>
              <div class="item"><img src="{{ asset('image/catalog_single-5.jpg') }}" alt="" width="770" height="520"></div>
              <div class="item"><img src="{{ asset('image/catalog_single-6.jpg') }}" alt="" width="770" height="520"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <h4>Description</h4>
              <p>{{$property-> Description }}</p>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <!-- This is just for diplay purposes but it coems to show that if you add enough content in the database you can easily display them -->
                    <tr class="bg-gray">
                      <th colspan="2">Property Amenities</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Features</td>
                        <td>Lawn, Sprinkler System, Marble Floors</td>
                      </tr>
                      <tr>
                        <td>MLS Listing ID</td>
                        <td>12345678</td>
                      </tr>
                      <tr>
                        <td>Year Built</td>
                        <td>1868</td>
                      </tr>
                      <tr>
                        <td>Lot Size</td>
                        <td>5.45</td>
                      </tr>
                      <tr>
                        <td>School District</td>
                        <td>Boston Glen (925) 862-2026</td>
                      </tr>
                      <tr>
                        <td>High School</td>
                        <td>Call School District</td>
                      </tr>
                      <tr>
                        <td>Middle School</td>
                        <td>Call School District</td>
                      </tr>
                      <tr>
                        <td>Elementary School</td>
                        <td>Call School District</td>
                      </tr>
                      <tr>
                        <td>Parking Type</td>
                        <td>Garage - Attached</td>
                      </tr>
                      <tr>
                        <td>Room Count</td>
                        <td>6</td>
                      </tr>
                      <tr>
                        <td>Roof Type</td>
                        <td>Tile</td>
                      </tr>
                      <tr>
                        <td>View Type</td>
                        <td>Mountain</td>
                      </tr>
                      <tr>
                        <td>Exterior Type</td>
                        <td>Stucco</td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4">
          <div class="catalog-sidebar row row-60">
            <div class="sidebar-module col-lg-12 col-md-6 text-left order-lg-0">
              <ul class="list-unstyled small">
                <li><span class="text-darker">Created:</span>
                  <time datetime="2015">{{$property-> created_at->format('l jS \\of F Y')}}</time>
                </li>
                <li><span class="text-darker">Updated:</span>
                  <time datetime="2015">{{$property->updated_at->diffForHumans()}}</time>
                </li>
              </ul>
            </div>
            <div class="sidebar-module col-md-6 col-lg-12 order-lg-2">
              <ul class="describe-1 list-unstyled">
                <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/contract.svg') }}" class="svgIMG"/></span></span>{{$property-> Condition}}</li>
                <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/bathtub.svg') }}" class="svgIMG"/></span></span>{{$property-> NumberOfBathrooms}} bathroom(s)</li>
                <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/landline.svg') }}" class="svgIMG1"/></span></span>{{$property-> Landline}}</li>

              </ul>
              <ul class="describe-2 list-unstyled preffix-2">
                <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/type1.svg') }}" class="svgIMG1"/></span></span>{{$property-> Type}}</li>
                <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/bed.svg') }}" class="svgIMG1"/></span></span>{{$property-> NumberOfBedrooms}} bedroom(s)</li>
                <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/kitchen.svg') }}" class="svgIMG1"/></span></span>{{$property-> NumberOfKitchens }} kitchen(s)</li>

              </ul>
              <ul class="describe-1 list-unstyled">
                <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/address.svg') }}" class="svgIMG"/></span></span>{{$property-> Address}}</li>
                <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/city.svg') }}" class="svgIMG"/></span></span>{{$property-> City}}</li>
                <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/region.svg') }}" class="svgIMG"/></span></span>{{$property-> Region}}</li>

              </ul>
              <ul class="describe-2 list-unstyled preffix-2">
                <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/postalcode.svg') }}" class="svgIMG1"/></span></span>{{$property-> PostalCode}}</li>
                <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/country.svg') }}" class="svgIMG1"/></span></span>{{$property-> Country }}</li>
              </ul>
            </div>

            <div class="sidebar-module col-md-6 col-lg-12 order-lg-3">
              <div class="price">
                <p class="small">Price</p>
                <p><span class="h4">£{{$property-> PricePerWeek}}.00/<span class="mon">week</span></span></p>
                <div class="btn-group-isotope" style="font-family:'Raleway'">
                  <a class="btn btn-warning btn-warning-transparent btn-md btn-min-width-lg"  href="/properties/create">Add new property</a>
                  <a class="btn btn-primary btn-md btn-min-width-lg"  href="/properties/{{ $property->id}}/edit">Edit property</a>
                  @if($property->user_id == Auth::user()->id)
                  <button title="Delete" type="submit" class="btn  btn-danger btn-danger-transparent btn-md btn-min-width-lg" onclick="var result = confirm('Are you sure you wish to delete this Property?');
                    if( result ){
                      event.preventDefault();
                      document.getElementById('delete-form').submit();
                    }"> Delete property
                  </button>
                  @endif
              <form id="delete-form" action="{{ route('properties.destroy',[$property->id]) }}"
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form>
                </div>
              </div>
            </div>
            <div class="sidebar-module col-md-6 col-lg-12 order-lg-7" style="padding-right: 0px;">
              <h4>Agent Information</h4>
              <div class="media media-mod-3">
                <div class="media-left round img-width-auto"><img id="smallIMG" class="round" src="/image/avatars/{{ Auth::user()->avatar}}" ></div>
                <div class="media-body">
                  <h6 class="text-accent">{{$property->user->honorific}} {{$property->user->name}}</h6>
                  <p class="small text-darker">Listing Agent</p>
                  <a class="text-bold" href="mailto:{{$property->user-> email}}" id="links"><i class="fas fa-envelope"></i> {{$property->user-> email}}</a>
                </br>
                  <a class="text-bold" href="callto:{{$property->user-> mobile_number}}" id="linksLg"><i class="fas fa-phone"></i> {{$property->user-> mobile_number}}</a>
                </div>
              </div>
              <a class="btn btn-primary btn-block btn-primary-transparent btn-sm" href="{{ route('users.index') }} ">View Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Page Footer-->
  <footer class="page-foot text-center text-lg-left bg-gray">
    <div class="container-fluid">
      <div class="footer-wrap">
        <div class="rd-navbar-brand wow fadeInUp" data-wow-delay=".2s"><a class="brand-name" href="index.html"><img src="{{ asset('image/logo-gray-139x37.png') }}" width="139" height="37" alt=""></a></div>
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
