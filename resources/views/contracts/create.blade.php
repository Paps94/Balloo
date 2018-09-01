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
          <h2 style="font-family: Krona One; color: #fff;">Contract creation </h2>
          <p></p>
          <div id="cssmenu">
            <ul>
              <li class="active"><a>Add new Contract</a></li>
              <li><a href="{{ url('contracts') }}">My Contracts</a></li>
              <li><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-sm" style="background-color: #fff ">
    <div class="container">
      <h2 style="font-family:'Montserrat'">Fill in the Form</h2>
      <hr>
      <!-- RD form-->
      <form method="post" action="{{ route('contracts.store') }}" class="inset-6">
        {{ csrf_field() }}

      <div class="row row-45 row-md-60 submit-form text-left">
        <div class="col-sm-12 col-md-6">
          <div class="form-group">
            <label class="form-label-outside small" for="Property-Content">Property<span class="required">*</span></label>
              @if($properties == null)
                <input type="hidden" name="property_id" value="{{$property_id}}" />
              @endif
              @if($properties != null)
            <select class="rd-mailform1-select form-control" required id="Property-Id" required name="property_id" placeholder="Search a property" style="margin-bottom: 15px;">
              <option value="" disabled selected>Select your option</option>
                @foreach ($properties as $property)
                  <option value="{{$property->id}}">{{$property->Address}} {{$property->PostalCode}}</option>
                @endforeach
            </select>
            <div class="row" style="margin-top:20px;">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Property-Type">Property Type</label>
                  <input type="text" disabled class="form-control"name="Type" id="Property-Type" placeholder=" "  style="width:100%">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Property-Condition">Property Condition</label>
                  <input type="text" disabled class="form-control"name="Condition" id="Property-Condition" placeholder=" "  style="width:100%">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small" for="Property-Landline">Landline</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">+44</div>
                    </div>
                    <input type="text" disabled class="form-control" id="Property-Landline"  name="Landline" placeholder="" >
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label-outside small" for="Property-Price">Price {per week} (£)</label>
                  <input type="text" class="form-control" name="PricePerWeek" id="Property-Price" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="small" for="Property-Bed">Beds</label>
                  <input class="form-control" id="Property-Bed" name="NumberOfBedrooms" disabled placeholder="" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="small" for="Property-Bath">Baths</label>
                  <input class="form-control" id="Property-Bath" name="NumberOfBathrooms" disabled placeholder="" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="small" for="Property-Kitchen">Kitchens</label>
                  <input class="form-control" id="Property-Kitchen" name="NumberOfKitchens" disabled placeholder="" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label-outside small" for="Property-City">City</label>
                  <input class="form-control" type="text" id="Property-City" name="City" disabled placeholder=""  style="width:100%">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label-outside small" for="Property-Region">Region</label>
                  <input class="form-control" type="text" id="Property-Region" name="Region" disabled placeholder=""  style="width:100%">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label-outside small" for="Property-Country">Country</label>
                  <input class="form-control" type="text" id="Property-Country" name="Country" disabled placeholder=""  style="width:100%">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label-outside small" for="Property-Updated">Last Update</label>
                  <input class="form-control" type="text" id="Property-Updated" name="updated_at" disabled placeholder=""  style="width:100%">
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="small" for="Property-Tenants">Property Tenants (Max of 10)<span class="required">*</span></label>
            <form method="get">
              <div class="input-group mb-3">
                <input type="number" class="form-control" id="Tenants" name="NumberOfTenats" required placeholder="Please enter the number of tenants"  min="1" max="10" onkeypress="return isNumberKey(event)">
                <div class="input-group-append">
                  <a class="btn btn-warning" id="filldetails" onclick="addFields()">Fill Details</a>
                </div>
                <div style="margin-top:20px; width:100%;" id="container"/>
              </div>
            </form>
            <div class="row" >
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small" for="Contract-Dates">Contract Dates<span class="required">*</span></label>
                  <input type="text" name="Dates" style="border-radius:5px; padding: 8px 10px;"/>
                  <input type="hidden" id="SD" name="StartDate" value=""/>
                  <input type="hidden" id="ED" name="EndDate" value=""/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small" for="Contract-ContractLength">Contract Length<span class="required">*</span></label>
                  <input type="text" class="form-control" readonly id="Contract-ContractLength" name="ContractLength" placeholder=""  >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="small" for="Contract-Bills">Bills Included (Gas | Electricity | Water)</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <input type="checkbox" id="Contract-Bills" name="BillsIncluded" value="1">
                      </div>
                    </div>
                  <input type="text" class="form-control" disabled placeholder="<- Check box if true">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label-outside small" for="Contract-Deposit">Deposit<span class="required">*</span></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><span class="icon-square"><img src="{{ asset('fonts/deposit.svg') }}" class="svgIMG"/></span></span>
                    </div>
                    <input type="text" class="form-control" id="Contract-Deposit" name="Deposit" required placeholder="Enter a Deposit"  onkeypress="return isNumberKey(event)">
                    <div class="input-group-append">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <hr1 style="width:100%; margin-bottom: 10px;">
                <input class="btn btn-sm btn-primary btn-block btn-min-width-md" type="submit" value="Create" style="border-color: #428EFE; margin-top:15px;"/>
                <hr1 style="width:100%; margin-top: 10px;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
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
      </div>
    </div>
  </footer>

<!--  Adds input fields based on users input-->
<script>
  function addFields(){
   var number = document.getElementById("Tenants").value;
   var container = document.getElementById("container");
   while (container.hasChildNodes()) {
       container.removeChild(container.lastChild);
   }
   for (i=0;i<number;i++){

     container.appendChild(document.createTextNode("Tenant " + (i+1) + " (Name and Surname)"));
     var input = document.createElement("input");
     input.type = "text";
     input.id = "Tenant" + (i+1);
     input.classList.add("form-control");

     container.appendChild(input);
     container.appendChild(document.createElement("br"));
     container.appendChild(document.createElement("br"));
   }
  }
</script>

<!--  Script below is used for the customization of the date box to be displayed the way it's supposed to-->
<script type="text/javascript">



      $('input[name="Dates"]').daterangepicker({
        "ranges": {
          "48 Weeks": [
            moment(),
            moment().add(48, 'weeks')
          ],
          "52 Weeks": [
            moment(),
            moment().add(52, 'weeks')
          ]
        },
        singleDatePicker: false,
        showDropdowns: false,
        //minDate: new Date(),
        opens: "center",
        buttonClasses: "btn btn-sm1",
        showWeekNumbers: true,
        dateLimit: {
          "months": 12
        },
        locale: {
          format: "DD/MM/YYYY",
          separator: " - ",
          applyLabel: "Apply",
          cancelLabel: "Cancel",
          fromLabel: "From",
          toLabel: "To",
          customRangeLabel: "Custom",
          weekLabel: "Week",
        }
  });

  $('input[name="Dates"]').on('apply.daterangepicker', function(ev, picker) {
    document.getElementById('SD').value = picker.startDate.format('YYYY-MM-DD');
    document.getElementById('ED').value = picker.endDate.format('YYYY-MM-DD');
    console.log(picker.startDate.format('YYYY-MM-DD'));
    console.log(picker.endDate.format('YYYY-MM-DD'));
  });

  function addFields(){
   var number = document.getElementById("Tenants").value;
   var container = document.getElementById("container");
   while (container.hasChildNodes()) {
       container.removeChild(container.lastChild);
   }
   for (i=0;i<number;i++){

     container.appendChild(document.createTextNode("Tenant " + (i+1) + " (Wallet Address)"));
     var input = document.createElement("input");
     input.type = "text";
     input.id = "Tenant" + (i+1);
     input.classList.add("form-control");
     container.appendChild(input);
     container.appendChild(document.createElement("br"));
     container.appendChild(document.createElement("br"));
   }
  }


  function myFunction() {
    var Custom = document.getElementById("Custom").id;
    document.getElementById("Contract-ContractLength").value = Custom;
  }
  function myFunction1() {
    var Custom1 = document.getElementById("48 Weeks").id;
    document.getElementById("Contract-ContractLength").value = Custom1;
  }
  function myFunction2() {
    var Custom2 = document.getElementById("52 Weeks").id;
    document.getElementById("Contract-ContractLength").value = Custom2;
  }
</script>


<!-- //script that populates the disabled input fileds when a property is selected -->
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','#Property-Id',function () {
            var prod_id=$(this).val();
            var a=$(this).parent();
            //a.data('id', prod_id);
            // console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findPrice')!!}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("PricePerWeek");
                    console.log(data.PricePerWeek);
                    // here price is coloumn name in proeprties table data.coln name
                    a.find('#Property-Price').val(data.PricePerWeek);
                },
                error:function(){
                }
            });
        });

        $(document).on('change','#Property-Id',function () {
            var prod_id=$(this).val();
            var a=$(this).parent();
            //a.data('id', prod_id);
            // console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findType')!!}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("Type");
                    console.log(data.Type);
                    // here price is coloumn name in proeprties table data.coln name
                    a.find('#Property-Type').val(data.Type);
                },
                error:function(){
                }
            });
        });

        $(document).on('change','#Property-Id',function () {
            var prod_id=$(this).val();
            var a=$(this).parent();
            //a.data('id', prod_id);
            // console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findCondition')!!}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("Condition");
                    console.log(data.Condition);
                    // here Condition is coloumn name in proeprties table data.coln name
                    a.find('#Property-Condition').val(data.Condition);
                },
                error:function(){
                }
            });
        });

        $(document).on('change','#Property-Id',function () {
            var prod_id=$(this).val();
            var a=$(this).parent();
            //a.data('id', prod_id);
            // console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findBeds')!!}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("NumberOfBedrooms");
                    console.log(data.NumberOfBedrooms);
                    // here NumberOfBedrooms is coloumn name in properteis table data.coln name
                    a.find('#Property-Bed').val(data.NumberOfBedrooms);
                },
                error:function(){
                }
            });
        });

        $(document).on('change','#Property-Id',function () {
            var prod_id=$(this).val();
            var a=$(this).parent();
            //a.data('id', prod_id);
            // console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findBaths')!!}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("NumberOfBathrooms");
                    console.log(data.NumberOfBathrooms);
                    // here NumberOfBathrooms is coloumn name in proeprties table data.coln name
                    a.find('#Property-Bath').val(data.NumberOfBathrooms);
                },
                error:function(){
                }
            });
        });

        $(document).on('change','#Property-Id',function () {
            var prod_id=$(this).val();
            var a=$(this).parent();
            //a.data('id', prod_id);
            // console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findKitchens')!!}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("NumberOfKitchens");
                    console.log(data.NumberOfKitchens);
                    // here NumberOfKitchens is coloumn name in proeprties table data.coln name
                    a.find('#Property-Kitchen').val(data.NumberOfKitchens);
                },
                error:function(){
                }
            });
        });

        $(document).on('change','#Property-Id',function () {
            var prod_id=$(this).val();
            var a=$(this).parent();
            //a.data('id', prod_id);
            // console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findLandline')!!}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("Landline");
                    console.log(data.Landline);
                    // here Landline is coloumn name in proeprties table data.coln name
                    a.find('#Property-Landline').val(data.Landline);
                },
                error:function(){
                }
            });
        });

        $(document).on('change','#Property-Id',function () {
            var prod_id=$(this).val();
            var a=$(this).parent();
            //a.data('id', prod_id);
            // console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findRegion')!!}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("Region");
                    console.log(data.Region);
                    // here Region is coloumn name in proeprties table data.coln name
                    a.find('#Property-Region').val(data.Region);
                },
                error:function(){
                }
            });
        });

        $(document).on('change','#Property-Id',function () {
            var prod_id=$(this).val();
            var a=$(this).parent();
            //a.data('id', prod_id);
            // console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findCity')!!}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("City");
                    console.log(data.City);
                    // here City is coloumn name in proeprties table data.coln name
                    a.find('#Property-City').val(data.City);
                },
                error:function(){
                }
            });
        });

        $(document).on('change','#Property-Id',function () {
            var prod_id=$(this).val();
            var a=$(this).parent();
            //a.data('id', prod_id);
            // console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findCountry')!!}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("Country");
                    console.log(data.Country);
                    // here Country is coloumn name in proeprties table data.coln name
                    a.find('#Property-Country').val(data.Country);
                },
                error:function(){
                }
            });
        });

        $(document).on('change','#Property-Id',function () {
            var prod_id=$(this).val();
            var a=$(this).parent();
            //a.data('id', prod_id);
            // console.log(prod_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findUpdated')!!}',
                data:{'id':prod_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("updated_at");
                    console.log(data.updated_at);
                    // here updated_at is coloumn name in proeprties table data.coln name
                    a.find('#Property-Updated').val(moment(data.updated_at).startOf('day').fromNow());
                },
                error:function(){
                }
            });
        });

    });
</script>

@endsection
