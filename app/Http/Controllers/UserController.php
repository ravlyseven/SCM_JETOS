<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show()
    {
        return view('profile.index');
    }
    
    public function editProfile($id)
    {
        $profile = User::find($id);
        return view('profile/edit', ['profile' => $profile]);
    }
    
    public function updateProfile(Request $request, $id)
    {
        $profile = User::find($id);
        $profile->update($request->all());
        return redirect('/profile')->with('sukses', 'Data Berhasil Diedit');
    }
}
