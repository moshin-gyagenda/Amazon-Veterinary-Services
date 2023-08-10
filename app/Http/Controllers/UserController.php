<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function login(Request $request)
     {
         if (!Auth::attempt(['email' => $request->input('email_or_username'), 'password' => $request->input('password')]) 
             && !Auth::attempt(['username' => $request->input('email_or_username'), 'password' => $request->input('password')])) {
             return redirect()->back()->with('error', 'Username and password incorrect!');
         }
 
         $user = User::where('email', $request->input('email_or_username'))
              ->orWhere('username', $request->input('email_or_username'))
              ->first();
 
              if ($user->role === 'admin') {
                 return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
             } else {
                return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
             }
     }


    public function create()
    {
        return view('dashboard.admin-register');
    }


    public function register()
    {
        return view('dashboard.register');
    }

    public function userRegister(Request $request)
    {
        $user = new User();
        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'customer'; 

        if ($user->save()) {
            return redirect()->back()->with('success', 'Account Created Successful');
        } else {
            return redirect()->back()->with('error', 'Failed to register');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Create a new User instance
        $user = new User();
        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        // Save the uploaded profile picture
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $profilePicturePath = $profilePicture->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicturePath;
        }
        
        // Save the user to the database
        if ($user->save()) {
            // User registration successful
            return redirect()->back()->with('success', 'User registered successfully');
        } else {
            // Failed to register user
            return redirect()->back()->with('error', 'Failed to register user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users=User::all();
        return view('dashboard.user-list', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
        
    }
}
