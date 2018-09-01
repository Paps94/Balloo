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
          <h1>Contract Gallery</h1>
          <p></p>
          <div id="cssmenu">
            <ul>
              <li class="active"><a>My Contracts</a></li>
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
      <h2>List of contracts</h2>
      <hr>
      <p>Add new contract</p>
      <a class="btn btn-warning btn-warning-transparent btn-md btn-min-width-lg" style="font-family:'Raleway'" href="/contracts/create">Add new contract</a>
      </br>
      <hr>
      <p>Select a running contract</p>
    </div>
  </section>
  <section class="section-md text-center text-md-left" >
    <div class="container">
      <div class="isotope row row-45 row-md-60 clearleft-custom">
        @foreach ($contracts as $contract)
        <div class="isotope-item col-sm-12 col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".2s" >
          <div class="card-group">
            <div class="card">
              <div class="thumbnail"><a class="img-link" href="/contracts/{{$contract->id}}"><img src="{{ asset('image/contractthumb.jpg') }}" /><span class="thumbnail-price">£{{$contract->PricePerWeek}}.00/<span class="mon">week</span></span></a>
                <div class="card-header">
                  <ul class="nav nav-pills nav-fill" id="contract-tab" role="tablist">
                    <li class="nav-item ">
                      <a class="nav-link active" id="contract-general-tab" data-toggle="pill" href="#contract-general{{$contract->id}}" role="tab" aria-controls="contract-general" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contract-sumbit-tab" data-toggle="pill" href="#contract-sumbit{{$contract->id}}" role="tab" aria-controls="contract-sumbit" aria-selected="false">Sumbit</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="contract-tabContent">
                    <div class="tab-pane fade show active" id="contract-general{{$contract->id}}" role="tabpanel" aria-labelledby="contract-general-tab">
                      <div class="caption">
                        <h4><a href="/contracts/{{$contract->id}}">{{$contract->Address}}<span> {{$contract->PostalCode}}</span></a></h4>
                        <ul class="describe-1">
                          <label>Start Date - End Date:</label>
                          <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/startDate.svg') }}" class="svgIMG1"/></span></span>{{Carbon\Carbon::parse($contract->StartDate)->format('l jS \\of F Y')}}</li>
                          <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/endDate.svg') }}" class="svgIMG1"/></span></span>{{Carbon\Carbon::parse($contract->EndDate)->format('l jS \\of F Y')}}</li>
                          <label class="labelStyle">Deposit:</label>
                          <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/deposit.svg') }}" class="svgIMG1"/></span></span>£ {{$contract->Deposit}} Deposit</li>
                          <label class="labelStyle">Bills Included:</label>
                          <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/bills.svg') }}" class="svgIMG1"/></span></span>{{$contract->bills}}</li> <!-- {{$contract->BillsIncluded ? 'True' : 'False'}} -->
                          <label class="labelStyle">Number of Tenant(s):</label>
                          <li><span class="icon-square"><span class="icon-square"><img src="{{ asset('fonts/nooftenants.svg') }}" class="svgIMG1"/></span></span>{{$contract->NumberOfTenats}} Tenant(s)</li>
                        </ul>                                                                                                                                                        <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
                        <p>{{$contract->Description }}</p>                                                                                                                           <!-- Alternative to using the bills function found in the Contacts Model -->
                      </div>
                    </div>
                    <div class="tab-pane fade" id="contract-sumbit{{$contract->id}}" role="tabpanel" aria-labelledby="contract-sumbit-tab">
                      <h5 class="card-title">{{$contract->property->Address}} {{$contract->property->PostalCode}}</h5>
                      <p class="card-text" style="text-align: justify;">Contract is ready to be deployed on the Blockchain. Please do one final check to ensure the correctness of data then click the 'Publish' button</p>
                      <a href="#" class="btn btn-warning btn-block" style="margin: 10px 0; position: relative;;"  onclick="var result = confirm('Are you sure you wish to publish this Smart Contract?')">Publish</a>
                    </div>
                  </div>
                </div>
              <div class="card-footer">
                <small class="text-muted">Last updated: {{$contract->updated_at->diffForHumans()}}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
        @endforeach

    </div>
    {{-- Use in the build in links() method to create the different pages --}}
    {{$contracts->links()}}
  </section>

  <!-- Page Footer-->
  <footer class="page-foot text-center text-lg-left bg-gray" style="margin-top: 50px;">
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
