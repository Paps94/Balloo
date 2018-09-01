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
          <h2 style="font-family: Krona One; color: #fff;">Property Update </h2>
          <p></p>
          <div id="cssmenu">
            <ul>
              <li class="active"><a>Edit Property</a></li>
              <!-- Fix link to correct property-->
              <li><a href="{{ url('properties') }}/{{$property-> id}}">Single Property</a></li>
              <li><a href="{{ url('properties') }}">My Properties</a></li>
              <li><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-sm" style="background-color: #fff">
    <div class="container">
      <h2 style="font-family:'Montserrat'">Fill in the Form</h2>
      <hr>
      <div class="row row-45 row-md-60 submit-form text-left">
        <div class="col-md-6">
          <!-- RD form-->
          <form method="post" action="{{ route('properties.update',[$property->id]) }}" class="inset-6">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">

            <div class="form-group">
              <label class="form-label-outside small" for="Property-Description">Property Description<span class="required">*</span></label>
              <textarea class="form-control" id="Property-Description" required name="Description" value="{{$property-> Description}}">{{$property-> Description}}</textarea>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small" for="Property-Type">Property Type<span class="required">*</span></label>
                  <select class="rd-mailform-select form-control" id="Property-Type" required name="Type" value="{{$property-> Type}}">
                    <option value="" disabled selected>Select your option</option>
                    <option value="House">House</option>
                    <option value="Apartment">Apartment</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small" for="Property-Condition">Condition<span class="required">*</span></label>
                  <select class="rd-mailform-select form-control" id="Property-Condition" required name="Condition" value="{{$property-> Condition}}">
                    <option value="" disabled selected >Please Choose...</option>
                    <option value="Available">Available</option>
                    <option value="Under Contract">Under Contract</option>
                    <option value="Under Construction">Under Construction</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small" for="Property-Landline">Landline</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">+44</div>
                    </div>
                    <input type="text" class="form-control" id="Property-Landline" name="Landline" value="{{$property-> Landline}}" onkeypress="return isNumberKey(event)">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label-outside small" for="Property-Price">Price (£)<span class="required">*</span></label>
                  <input class="form-control" id="Property-Price" name="PricePerWeek" required value="{{$property-> PricePerWeek}}" onkeypress="return isNumberKey(event)">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="small" for="Property-Bed">Beds<span class="required">*</span></label>
                  <select class="rd-mailform-select form-control" id="Property-Bed" name="NumberOfBedrooms" required value="{{$property-> NumberOfBedrooms}}">
                    <option value="" disabled selected >Choose...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="5">7</option>
                    <option value="6">8</option>
                    <option value="5">9</option>
                    <option value="6">10</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="small" for="Property-Bath">Baths<span class="required">*</span></label>
                  <select class="rd-mailform-select form-control" id="Property-Bath" name="NumberOfBathrooms" required value="{{$property-> NumberOfBathrooms}}">
                    <option value="" disabled selected >Choose...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="5">7</option>
                    <option value="6">8</option>
                    <option value="5">9</option>
                    <option value="6">10</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="small" for="Property-Kitchen">Kitchens<span class="required">*</span></label>
                  <select class="rd-mailform-select form-control" id="Property-Kitchen" name="NumberOfKitchens" required value="{{$property-> NumberOfKitchens}}">
                    <option value="" disabled selected >Choose...</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!--  Second section with Lovation data-->
          <div class="col-sm-12 col-md-6">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="form-label-outside small" for="Property-Address">Address<span class="required">*</span></label>
                  <input class="form-control"  type="text" id="Property-Address" name="Address" placeholder="{{$property-> Address}}" value="{{$property-> Address}}" style="min-width:100%">
                  <!-- Google maps Api to be added at a later stage together with longitute and latitude coordinates  -->
                  <!-- <div class="rd-google-map rd-google-map__model rd-google-map-mod-2"  id="map-canvas"></div> -->
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-label-outside small" for="Property-PostalCode">Post Code<span class="required">*</span></label>
                  <input class="form-control" type="text" id="Property-PostalCode" name="PostalCode" placeholder="{{$property-> PostalCode}}" value="{{$property-> PostalCode}}" style="min-width:100%">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Property-Region">Region (if applicable)</label>
                  <input class="form-control" type="text" id="Property-Region" name="Region"  value="{{$property-> Region}}" style="width:100%">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label-outside small" for="Property-City">City<span class="required">*</span></label>
                  <input class="form-control" type="text" id="Property-City" name="City" required value="{{$property-> City}}" style="width:100%">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Property-Country">Country<span class="required">*</span></label>
                  <input class="form-control" type="text" id="Property-Country" name="Country" required value="{{$property-> Country}}" style="width:100%">
                </div>
              </div>
            </div>
            <div class="form-group">
              <input class="btn btn-sm btn-primary btn-min-width-md" type="submit" value="Update" style="background-color:#428EFE"/>
            </div>
          </div>
          </form>
        </div>
      </div>
  </section>
  <!-- Page Footer-->
  <footer class="page-foot text-center text-lg-left bg-gray">
    <div class="container-fluid">
      <div class="footer-wrap">
        <div class="rd-navbar-brand wow fadeInUp" data-wow-delay=".2s"><a class="brand-name" href="index.html"><img src="images/logo-gray-139x37.png" width="139" height="37" alt=""></a></div>
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
