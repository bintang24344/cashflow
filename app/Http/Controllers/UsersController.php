<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Show the login form.
     */
    public function index()
    {
        return view('login'); // Menampilkan form login
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'password.required' => 'Password is required'
        ]);

        // Mendapatkan kredensial
        $credentials = $request->only('email', 'password');

        // Memeriksa login
        if (Auth::attempt($credentials)) {
            // Mendapatkan pengguna yang sedang login
            $user = Auth::user();
            $request->session()->put('user', $user->name);
            $request->session()->put('role', $user->role);

            // Menghitung data untuk dashboard
            $nominal = Transaksi::sum('nominal');
            $pemasukan = Transaksi::where('tipe', 'pemasukan')->sum('nominal');
            $pengeluaran = Transaksi::where('tipe', 'pengeluaran')->sum('nominal');
            $saldo = $pemasukan - $pengeluaran;

            // Arahkan pengguna berdasarkan perannya
            if ($user->role === 'admin') {
                return redirect()->route('admin.index')->with([
                    'data' => Transaksi::all(),
                    'nominal' => $saldo,
                    'pemasukan' => $pemasukan,
                    'pengeluaran' => $pengeluaran,
                    'role' => $user->role
                ]);
            } elseif ($user->role === 'user') {
                return redirect()->route('home.index')->with([
                    'data' => Transaksi::all(),
                    'nominal' => $saldo,
                    'pemasukan' => $pemasukan,
                    'pengeluaran' => $pengeluaran,
                    'role' => $user->role
                ]);
            }
        } else {
            // Redirect kembali dengan error jika login gagal
            return redirect('/')->withErrors(['email' => 'Wrong email or password'])->withInput();
        }
    }

    /**
     * Handle logout request.           
     */
    public function logout(Request $request)
    {
        // Logout pengguna
        Auth::logout();

        // Invalidasi sesi
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman utama
        return redirect('/');
    }
}
