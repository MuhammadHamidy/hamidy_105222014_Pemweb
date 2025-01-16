<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class NomorSatu {

    public function auth(Request $request) {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('event.home');
        }
        
        $user = User::where('username', $request->email)->first();
        
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('event.home')->with('success', 'Login berhasil');
        }
        
        return redirect()->back()->with('error', 'Login gagal');
    }
        
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('event.home')->with('success', 'Logout berhasil');
    }
}
?>