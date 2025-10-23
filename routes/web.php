<?php

use Illuminate\Support\Facades\Route;   // ✅ tambahkan ini
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;


// === ROUTE FRONTEND ===
Route::get('/', fn() => view('home'));
Route::get('/search', fn() => view('search'));
Route::get('/results', fn() => view('results'));
Route::get('/about', fn() => view('about'));
Route::get('/contact', fn() => view('contact'));

// === REGISTER ===
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    Auth::login($user);

    return redirect('/')->with('success', 'Akun berhasil dibuat!');
})->name('register');

// === LOGIN ===
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/')->with('success', 'Berhasil login!');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
})->name('login');

// === LOGOUT ===
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Berhasil logout!');
})->name('logout');

// hasil pencarian
Route::get('/results', fn() => view('results'));

// form booking
Route::get('/booking', fn() => view('booking'));

// simpan booking
Route::post('/booking', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'passengers' => 'required|integer|min:1',
        'flight_code' => 'required'
    ]);

    Booking::create($request->all());
    return redirect('/dashboard')->with('success', 'Tiket berhasil dipesan!');
});

// dashboard user
Route::get('/dashboard', function () {
    $bookings = Booking::where('email', Auth::user()->email)->get();
    return view('dashboard', compact('bookings'));
})->middleware('auth');