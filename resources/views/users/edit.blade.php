@extends('layouts.app')

@section('content')

<!-- Page-->
<div class="page text-left">
  <!-- Page Content-->
  <!-- Section Title Breadcrumbs-->
  <section class="section-full">
    <div class="container">
      <div class="row justify-content-xl-end">
        <div class="col-sm-12 col-xl-8">
          <h2 style="color:#fff; font-family:'Krona One'">Your Profile</h2>
          <div id="cssmenu">
            <ul>
              <li class="active"><a>Edit Profile</a></li>
              <li><a href="{{ url('users') }}">My Profile</a></li>
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
          <div class="img-wrap-mod-1"><img src="/image/avatars/{{ Auth::user()->avatar}}" style=" width=320px;  height=320px;" ></div>

            <form enctype="multipart/form-data" action="/users" method="POST">
                  <label>Update Profile Image</label>
                  <input type="file" name="avatar">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="submit" value="Upload Image" class="btn btn-sm btn-warning btn-full-width"  style="margin-top: 20px; margin-bottom: 10px;">
            </form>

            <form method="post" action="{{ route('users.update',[$user->id]) }}" class="inset-6">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="put">

            <hr / style="width:100%">
            <div class="form-group">
              <label class="small" for="User-phone_number">Work Number</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"></i></div>
                </div>
                <input type="text" class="form-control" id="User-phone_number" name="phone_number" value="{{$user-> phone_number}}" onkeypress="return isNumberKey(event)">
              </div>
            </div>

            <div class="form-group">
              <label class="small" for="User-mobile_number">Mobile Number</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-mobile-alt fa-2x fa-fw" aria-hidden="true"></i></div>
                </div>
                <input type="text" class="form-control" id="User-mobile_number" name="mobile_number" value="{{$user-> mobile_number}}" onkeypress="return isNumberKey(event)">
              </div>
            </div>

            <div class="form-group">
              <label class="small" for="User-dob">Date Of Birth</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-birthday-cake  fa-2x fa-fw" aria-hidden="true"></i></div>
                </div>
                <input type="text" class="form-control" id="User-dob" name="date_of_birth1" value="{{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('d/m/Y') : null}}" readonly>
              </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-8 ">
          <h2 style="font-family: 'Raleway'">Fill in the details</h2>
          <h5>None are necessary but they are recommended</h5>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label-outside small" for="User-name">Name<span class="required">*</span></label>
                <input class="form-control" type="text" id="User-name" name="name" required value="{{$user-> name}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="User-email">Email<span class="required">*</span></label>
                <input class="form-control" type="text" id="User-email" name="email" required value="{{$user-> email}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group" >
                <label class="small" for="User-honorific">Honorific</label>
                <select class="rd-mailform-select form-control" id="User-honorific" name="honorific" value="{{$user->honorific}}">
                  <option value="" disabled selected >Please Choose...</option>
                  <option value="Mr">Mr</option>
                  <option value="Mrs">Mrs</option>
                  <option value="Miss">Miss</option>
                  <option value="Ms">Ms</option>
                  <option value="Dr">Dr</option>
                  <option value="Professor">Professor</option>
                </select>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label class="form-label-outside small" for="User-address">Address</label>
                <input class="form-control" type="text" id="User-address" name="address"  value="{{$user->address}}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-label-outside small" for="User-postcode">Post Code</label>
                <input class="form-control" type="text" id="User-postcode" name="postcode"  value="{{$user->postcode}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="small" for="User-date_of_birth ">Date Of Birth</label>
                <input class="datepicker" type="text" name="date_of_birth" style="border-radius:5px;"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="User-Region">Region (if applicable)</label>
                <input class="form-control" type="text" id="User-Region" name="region"  value="{{$user->region}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="User-city">City</label>
                <input class="form-control" type="text" id="User-city" name="city"  value="{{$user->city}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="User-country">Country</label>
                <input class="form-control" type="text" id="User-country" name="country"  value="{{$user->country}}">
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

  <script type="text/javascript">
        $('input[name="date_of_birth"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: '01/01/1918',
            maxDate: new Date()
    });
</script>

  @endsection
