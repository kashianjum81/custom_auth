<?php

namespace App\Http\Controllers;

use App\Models\Websetting;
use Illuminate\Http\Request;

class WebSettingsController extends Controller
{
    public function index()
    {
        return view('index');
    }

    //
    public function viewsettings()
    {
        $websettings = Websetting::first();
        return view('layouts.websettings', compact('websettings'));
    }

    public function websetting(Request $request )
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:png|max:2048', 
            'favcon' => 'nullable|image|mimes:png|max:2048',
            'webtitle' => 'required|string|max:255',
            'footer' => 'required|string|max:255',
        ]);
        $websettings = Websetting::first();
        // ...Logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = time() . $logo->getClientOriginalName();
            $logo->move(public_path('assets/images/logos'), $logoPath);
            $websettings->logo = $logoPath;
        }
        // .....for Favicon upload
        if ($request->hasFile('favcon')) {
            $favcon = $request->file('favcon');
            $favconPath = time() . $favcon->getClientOriginalName();
            $favcon->move(public_path('assets/images/favcon'), $favconPath);
            $websettings->favcon = $favconPath;
        }

        $websettings->webtitle = $request->webtitle;
        $websettings->footer = $request->footer;
    
        $websettings->update();
    
        return redirect()->back()->with('messages', 'Website Setting Update successfully');
    }
}
