<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Carbon\Carbon;
use App\Models\Transaksi; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = request()->input('filter');
        if ($keyword) {
        $data = Transaksi::where('tipe', $keyword)->orderBy('id', 'asc')->get();

        $pemas = Transaksi::where('tipe', 'pemasukan')->sum('nominal');
        $penge = Transaksi::where('tipe', 'pengeluaran')->sum('nominal');
        $pemasukan = number_format($pemas, 0, ',', '.');
        $pengeluaran = number_format($penge, 0, ',', '.');
        $saldo = number_format($pemas - $penge, 0, ',', '.');

        // $pemasukan = Transaksi::where('tipe', 'pemasukan')->sum('nominal');
        //     $pengeluaran = Transaksi::where('tipe', 'pengeluaran')->sum('nominal');
        //     $saldo = $pemasukan - $pengeluaran;

            if ($penge > 1000000) {
                redirect('home')->with('danger', 'kamu boros');
            }

            return view('user', [
                'data' => $data,
                'pemasukan' => $pemasukan,
                'pengeluaran' => $pengeluaran,
                'nominal' => $saldo,
            ]);
        } else {
            $data = Transaksi::orderBy('id', 'asc')->get();

            $pemasukan = Transaksi::where('tipe', 'pemasukan')->sum('nominal');
            $pengeluaran = Transaksi::where('tipe', 'pengeluaran')->sum('nominal');
            $saldo = $pemasukan - $pengeluaran;
    
            // $pemasukan = Transaksi::where('tipe', 'pemasukan')->sum('nominal');
            //     $pengeluaran = Transaksi::where('tipe', 'pengeluaran')->sum('nominal');
            //     $saldo = $pemasukan - $pengeluaran;
    
                if ($pengeluaran > 1000000) {
                    redirect('home')->with('danger', 'kamu boros');
                }
    
                return view('user', [
                    'data' => $data,
                    'pemasukan' => $pemasukan,
                    'pengeluaran' => $pengeluaran,
                    'nominal' => $saldo,
                ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penambahan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required|numeric',
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'deskripsi' => 'required',
        ],[
            'nominal.required' => 'NOMINAL TIDAK BOLEH KOSONG',
            'deskripsi.required' => 'DESKRIPSI TIDAK BOLEH KOSONG',
        ]);

        $pemasukan = Transaksi::where('tipe', 'pemasukan')->sum('nominal');
        $pengeluaran = Transaksi::where('tipe', 'pengeluaran')->sum('nominal');
        $saldo = $pemasukan - $pengeluaran;

        if ($request->tipe == 'pengeluaran' && $saldo < $request->nominal) {
            return back()->with('error', 'Saldo tidak cukup untuk pengeluaran ini');
        }

        Transaksi::create([
            'name' => Auth::user()->name,
            'nominal' => $request->nominal,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('home')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Transaksi::findOrFail($id);
        return view('edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nominal' => 'required|numeric',
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'deskripsi' => 'required|string',
        ], [
            'nominal.required' => 'Nominal wajib diisi',
            'tipe.required' => 'Tipe wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
        ]);

        $data = [
            'nominal' => $request->nominal,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
        ]; 

        $pemasukan = Transaksi::where('tipe', 'pemasukan')->sum('nominal');
        $pengeluaran = Transaksi::where('tipe', 'pengeluaran')->sum('nominal');
        $saldo = $pemasukan - $pengeluaran;
        
        if ($request->tipe == 'pengeluaran' && $saldo < $request->nominal) {
            return back()->with('error', 'Saldo tidak cukup untuk pengeluaran ini');
        }

        Transaksi::where('id', $id)->update($data);

        return redirect('home')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Transaksi::find($id)->delete();
        return redirect('home')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function export(){
        return Excel::download(new UsersExport(), 'transaksi.xlsx');
    }
}
