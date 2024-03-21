<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function update()
    {
        $userId = auth()->id();
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:8',
            'image' => 'mimes:png,jpg,jpeg',
        ]);
        if (request()->hasFile('image')) {
            $path = request('image')->store('users');
            $data['image'] = $path;
        }
        if (request()->has('password')) {
            $data['password'] = Hash::make(request('password'));
        }
        User::findOrFail($userId)->update($data);

        return back();
    }
}
