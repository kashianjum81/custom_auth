<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('index');
    }

    public function getUser()
    {

        $users = User::all();
        return view('check', compact('users'));
    }

    public function adminHome(): View
    {
        return view('index');
    }

    public function managerHome(): View
    {
        return view('manager.dashboard');
    }

    public function adminprofile(): View
    {
        $image = User::firstOrFail();

        return view('check',  compact('image'));
    }

    public function adminupdate(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagestore = time() . $image->getClientOriginalName();
            $image->move(public_path('assets/images/profile'), $imagestore);
            $user->image = $imagestore;
        }

        $user->save();

        return redirect()->route('home')->with('message', 'Admin profile updated successfully');
    }

    public function admindashboard(): View
    {
        return view('admin.dashboard');
    }

    public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8',
        'password_confirmation' => 'required|same:new_password',
    ]);
        $user = Auth::user();

    if (Hash::check($request->current_password, $user->password)) {
        $user->password= $request->new_password;
        $user->confirm_password=$request->password_confirmation;
        $user->update([
            'password' => bcrypt($request->new_password),
        ]);

        return redirect()->route('admin-profile')->with('success', 'Password changed successfully.');
    } else {
        return back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
    }
}
}
