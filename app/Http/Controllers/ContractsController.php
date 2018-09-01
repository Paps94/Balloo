<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Property;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractsController extends Controller
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
        $contracts = Contract::where('user_id', Auth::user()-> id)-> paginate(3);

        //Return the above query to the index page of the contracts file
                                      //Pass values to view
        return view('contracts.index', ['contracts' => $contracts]);
      }
      return view ('auth.login');

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create( $property_id = null)
  {
      //
      $properties = null;
      if(!$property_id){
        $properties = Property::where('user_id', Auth::user()->id)->get();
      }
      return view('contracts.create' , ['property_id'=>$property_id, 'properties'=>$properties->where('Condition', '!=','Under Contract')]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, Contract $contract)
  {
    // dd($request->all());
    $BillsIncluded = Input::has('BillsIncluded') ? true : false;

    $customMessages = [
      'required' => 'The :attribute field can not be blank.',
      'unique' => 'The :attribute already exists',
    ];
    $request->validate([
      'StartDate' => 'required|max:20',
      'EndDate' => 'required|max:20',
      'PricePerWeek' => 'required|max:30',
      'NumberOfTenats' => 'required|max:30',
      'ContractLength' => 'required|max:30',
      'BillsIncluded' => 'max:1',
      'Deposit' => 'required|max:30',
      'property_id' => 'required|max:30',

    ], $customMessages);

    $contract->user_id = $request->user()->id;
    $contract->StartDate = $request->StartDate;
    $contract->EndDate = $request->EndDate;
    $contract->NumberOfTenats = $request->NumberOfTenats;
    $contract->ContractLength = $request->ContractLength;
    $contract->PricePerWeek = $request->PricePerWeek;
    $contract->BillsIncluded = $request->BillsIncluded;
    $contract->Deposit = $request->Deposit;
    $contract->property_id = $request->property_id;



    if(!$contract->save()){
      return redirect()
       ->route('contracts.create')
       ->with('error', "Error creating contract");
    }
     return redirect()
      ->route('contracts.index')
      ->with('success', "Contract created successfully. Can be found below.");
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Contract  $contract
   * @return \Illuminate\Http\Response
   */
  public function show(Contract $contract)
  {
      //$contract = Contract::where('id', $contract->id)->first();
      $contract = Contract::find($contract->id);

      return view('contracts.show', ['contract'=>$contract]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Contract  $contract
   * @return \Illuminate\Http\Response
   */
  public function edit(Contract $contract)
  {
      //Taking the id that has been fetched and we are going to the DB to fetch the contract's details
      $contract = Contract::find($contract->id);
      //Pass it to the edit page
      return view('contracts.edit', ['contract'=>$contract]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Contract  $contract
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Contract $contract)
  {
      //Find the specific contract from the databse
      $contractUpdate = Contract::where('id', $contract->id)
      ->update([
        //update its fields
          'StartDate'=>$request->input('StartDate'),
          'EndDate'=>$request->input('EndDate'),
          'PricePerWeek'=>$request->input('PricePerWeek'),
          'NumberOfTenats'=>$request->input('NumberOfTenats'),
          'ContractLength'=>$request->input('ContractLength'),
          'BillsIncluded'=>$request->input('BillsIncluded'),
          'Deposit'=>$request->input('Deposit'),
          'property_id'=>$request->input('property_id'),
      ]);
      //if successful take it back to the individual proeprty page with a success message
      if($contractUpdate){
        return redirect()->route('contracts.show',['contract'=> $contract->id])
        ->with ('success', 'Contract updated successfully');
      }
      //else redirect back
      return back()-withInput();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Contract  $contract
   * @return \Illuminate\Http\Response
   */
  public function destroy(Contract $contract)
  {
      //
      $findContract = Contract::find( $contract->id);
      if($findContract->delete()){

         //redirect
         return redirect()->route('contracts.index')
         ->with('success' , 'Contract deleted successfully');
     }
     return back()->withInput()->with('error' , 'Contract could not be deleted');
  }


      //Value retrival from databasepublic function findPrice(Request $request){
      public function findPrice(Request $request){

          //it will get PricePerWeek if its id match with proeprty id
          $p=Property::select('PricePerWeek')->where('id',$request->id)->first();

          return response()->json($p);
      }

      //Value retrival from databasepublic function findType(Request $request){
      public function findType(Request $request){

          //it will get Type if its id match with proeprty id
          $p=Property::select('Type')->where('id',$request->id)->first();

          return response()->json($p);
      }

      //Value retrival from databasepublic function findCondition(Request $request){
      public function findCondition(Request $request){

          //it will get Condition if its id match with proeprty id
          $p=Property::select('Condition')->where('id',$request->id)->first();

          return response()->json($p);
      }

      //Value retrival from databasepublic function findLandline(Request $request){
      public function findLandline(Request $request){

          //it will get Landline if its id match with proeprty id
          $p=Property::select('Landline')->where('id',$request->id)->first();

          return response()->json($p);
      }

      //Value retrival from databasepublic function findBeds(Request $request){
      public function findBeds(Request $request){

          //it will get NumberOfBedrooms if its id match with proeprty id
          $p=Property::select('NumberOfBedrooms')->where('id',$request->id)->first();

          return response()->json($p);
      }

      //Value retrival from databasepublic function findBaths(Request $request){
      public function findBaths(Request $request){

          //it will get NumberOfBathrooms if its id match with proeprty id
          $p=Property::select('NumberOfBathrooms')->where('id',$request->id)->first();

          return response()->json($p);
      }

      //Value retrival from databasepublic function findKitchens(Request $request){
      public function findKitchens(Request $request){

          //it will get NumberOfKitchens if its id match with proeprty id
          $p=Property::select('NumberOfKitchens')->where('id',$request->id)->first();

          return response()->json($p);
      }

      //Value retrival from databasepublic function findRegion(Request $request){
      public function findRegion(Request $request){

          //it will get Region if its id match with proeprty id
          $p=Property::select('Region')->where('id',$request->id)->first();

          return response()->json($p);
      }

      //Value retrival from databasepublic function findCity(Request $request){
      public function findCity(Request $request){

          //it will get City if its id match with proeprty id
          $p=Property::select('City')->where('id',$request->id)->first();

          return response()->json($p);
      }

      //Value retrival from databasepublic function findCountry(Request $request){
      public function findCountry(Request $request){

          //it will get Country if its id match with proeprty id
          $p=Property::select('Country')->where('id',$request->id)->first();

          return response()->json($p);
      }

      //Value retrival from databasepublic function findCountry(Request $request){
      public function findUpdated(Request $request){

          //it will get updated_at if its id match with proeprty id
          $p=Property::select('updated_at')->where('id',$request->id)->first();

          return response()->json($p);
      }


}
