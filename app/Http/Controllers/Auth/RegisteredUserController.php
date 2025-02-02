<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // Validasi input dari form registrasi
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Buat pengguna baru
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Cek jika email pengguna adalah admin@admin.com dan beri peran admin
    if ($request->email == 'admin@admin.com') {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);  // Membuat role admin jika belum ada
        $user->assignRole($adminRole);  // Mengaitkan peran admin pada pengguna
    }

    // Kirimkan event Registered untuk mendaftarkan pengguna
    event(new Registered($user));

    // Login pengguna yang baru dibuat
 

    // Redirect ke dashboard setelah berhasil registrasi
    return redirect(route('login', absolute: false));
}
}
