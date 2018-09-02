<?php

namespace App\Http\Controllers;

use App\User;
use Image;
use Storage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //Function for the uploading of user images
     public function update_avatar(Request $request){
       // Handle the user upload of avatar
       if($request->hasFile('avatar')){
         $avatar = $request->file('avatar');
         $filename = time() . '.' . $avatar->getClientOriginalExtension();
         $path = public_path('/image/avatars/')."/" . $filename;
         dd(is_writable($path . $fileName));
         $img = Image::make($avatar)->fit(320, 320)->save($path);
         //check if the user is the signed in user
         $user = Auth::user();
         //Save old image to a new variable for deleting purposes
         $oldFilename = $user->avatar;
         //udpate the database
         $user->avatar = $filename;
         //Delete old photo only if it's not the default.jpg image
         if ($oldFilename !== 'default.jpg'){
           Storage::delete($oldFilename);
         }
         //Save the image back to the users
          $user->save();
       }
       return view('users.edit', array('user' => Auth::user()) );
     }
    public function index()
    {
        //check if user is logged in
        if(Auth::check() ){
          $users = User::where('id', Auth::user()-> id);

          //Return the above query to the index page of the users file
                                        //Pass values to view
          return view('users.index', ['users' => $users]);
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
      $customMessages = [
        'required' => 'The :attribute field can not be blank.',
        'unique' => 'The :attribute already exists',
      ];
      $request->validate([
        'name' => 'required|max:30',
        'email' => 'required|unique:users|max:30',
        'honorific' => 'max:30|string',
        'date_of_birth' => 'max:15',
        'phone_number' => 'max:11',
        'mobile_number' => 'max:11',
        'address' => 'max:30',
        'postcode' => 'max:10',
        'region' => 'max:30',
        'city' => 'max:30',
        'country' => 'max:30',

      ], $customMessages);

      $user->user_id = $request->user()->id;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->honorific = $request->honorific;
      $user->date_of_birth = $request->date_of_birth;
      $user->phone_number = $request->phone_number;
      $user->mobile_number = $request->mobile_number;
      $user->address = $request->address;
      $user->postcode = $request->postcode;
      $user->region = $request->region;
      $user->city = $request->city;
      $user->country = $request->country;

      if(!$user->save()){
        return redirect()
         ->route('users.create')
         ->with('error', "Error creating user");
      }
       return redirect()
        ->route('users.index')
        ->with('success', "User created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //$user = User::where('id', $user->id)->first();
        $user = User::find($user->id);

        return view('users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //Taking the id that has been fetched and we are going to the DB to fetch the user's details
        $user = User::find($user->id);
        //Pass it to the edit page
        return view('users.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Find the specific user from the databse
        $userUpdate = User::where('id', $user->id)
        ->update([
          //update its fields
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'honorific'=>$request->input('honorific'),
            'date_of_birth'=>Carbon::parse($request->date_of_birth),
            'phone_number'=>$request->input('phone_number'),
            'mobile_number'=>$request->input('mobile_number'),
            'region'=>$request->input('region'),
            'address'=>$request->input('address'),
            'postcode'=>$request->input('postcode'),
            'city'=>$request->input('city'),
            'country'=>$request->input('country'),
        ]);
        //if successful take it back to the individual user page with a success message
        if($userUpdate){

          return redirect()->route('users.index',['user'=> $user->id])
          ->with ('success', 'User profile updated successfully');

        }
        //else redirect back
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $findUser = User::find( $user->id);
        if($findUser->delete()){
          //If the user deletes his profile also delete the stranded image attached
          Storage::delete($user->avatar);
           //redirect
           return view ('auth.register')
           ->with('success' , 'User removed successfully');

       }
       return back()->withInput()->with('error' , 'User could not be deleted');
    }
}
