<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
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
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
        'nomor_induk' => [
            'required',
            'string',
            'unique:users',
            function ($attribute, $value, $fail) use ($request) {
                $role = $request->role;

                if (in_array($role, ['dosen', 'pegawai', 'admin_akademik']) && (!preg_match('/^0\d{9}$/', $value))) {
                    $fail('Nomor induk untuk dosen, pegawai, dan admin akademik harus 10 digit dan diawali dengan 0.');
                }

                if ($role === 'mahasiswa' && (!preg_match('/^2\d{8}$/', $value))) {
                    $fail('NIM mahasiswa harus 9 digit dan diawali dengan 2.');
                }
            },
        ],
        'role' => 'required|in:mahasiswa,dosen,pegawai,admin_akademik',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'nomor_induk' => $request->nomor_induk,
        'role' => $request->role,
    ]);

    event(new Registered($user));

    return redirect()->route('login')->with('status', 'Register berhasil! Silakan login.');
}
}
