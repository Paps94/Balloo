<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check if user is logged in
        if(Auth::check() ){
          $properties = Property::where('user_id', Auth::user()-> id)-> paginate(3);

          //Return the above query to the index page of the properties file
                                        //Pass values to view
          return view('properties.index', ['properties' => $properties]);
        }
        return view ('auth.login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Property $property)
    {
      // dd($request->all());
      $customMessages = [
        'required' => 'The :attribute field can not be blank.',
        'unique' => 'The :attribute already exists',
      ];
      $request->validate([
        'Description' => 'required|max:100',
        'Type' => 'required|max:9',
        'Condition' => 'required|max:18',
        'PricePerWeek' => 'required|max:5',
        'Landline' => 'max:20',
        'NumberOfBedrooms' => 'required|max:30',
        'NumberOfBathrooms' => 'required|max:30',
        'NumberOfKitchens' => 'required|max:30',
        'Address' => 'required|unique:properties|max:30',
        'PostalCode' => 'required|unique:properties|max:10',
        'Region' => 'max:30',
        'City' => 'required|max:30',
        'Country' => 'required|max:30',

      ], $customMessages);

      $property->user_id = $request->user()->id;
      $property->Description = $request->Description;
      $property->Type = $request->Type;
      $property->Condition = $request->Condition;
      $property->Landline = $request->Landline;
      $property->PricePerWeek = $request->PricePerWeek;
      $property->NumberOfBedrooms = $request->NumberOfBedrooms;
      $property->NumberOfBathrooms = $request->NumberOfBathrooms;
      $property->NumberOfKitchens = $request->NumberOfKitchens;
      $property->Address = $request->Address;
      $property->PostalCode = $request->PostalCode;
      $property->Region = $request->Region;
      $property->City = $request->City;
      $property->Country = $request->Country;

      if(!$property->save()){
        return redirect()
         ->route('properties.create')
         ->with('error', "Error creating property");
      }
       return redirect()
        ->route('properties.index')
        ->with('success', "Property created successfully. Can be found below.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //$property = Property::where('id', $property->id)->first();
        $property = Property::find($property->id);

        return view('properties.show', ['property'=>$property], array('user' => Auth::user() ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //Taking the id that has been fetched and we are going to the DB to fetch the property's details
        $property = Property::find($property->id);
        //Pass it to the edit page
        return view('properties.edit', ['property'=>$property]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //Find the specific property from the databse
        $propertyUpdate = Property::where('id', $property->id)
        ->update([
          //update its fields
            'Description'=>$request->input('Description'),
            'Type'=>$request->input('Type'),
            'Condition'=>$request->input('Condition'),
            'Landline'=>$request->input('Landline'),
            'PricePerWeek'=>$request->input('PricePerWeek'),
            'NumberOfBedrooms'=>$request->input('NumberOfBedrooms'),
            'NumberOfBathrooms'=>$request->input('NumberOfBathrooms'),
            'NumberOfKitchens'=>$request->input('NumberOfKitchens'),
            'Address'=>$request->input('Address'),
            'PostalCode'=>$request->input('PostalCode'),
            'Region'=>$request->input('Region'),
            'City'=>$request->input('City'),
            'Country'=>$request->input('Country')
        ]);
        //if successful take it back to the individual proeprty page with a success message
        if($propertyUpdate){
          return redirect()->route('properties.show',['property'=> $property->id])
          ->with ('success', 'Property updated successfully');
        }
        //else redirect back
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
        $findProperty = Property::find( $property->id);
        if($findProperty->delete()){

           //redirect
           return redirect()->route('properties.index')
           ->with('success' , 'Property deleted successfully');
       }
       return back()->withInput()->with('error' , 'Property could not be deleted');
    }
}
