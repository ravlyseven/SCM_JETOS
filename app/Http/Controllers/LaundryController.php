<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laundry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LaundryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $laundrypenghuni = Laundry::where('user_id', Auth::user()->id)->get();
        $laundryadmin = Laundry::all();
        return view('laundry.index', compact('laundrypenghuni', 'laundryadmin'));
    }

    public function create()
    {
        return view('laundry.create');
    }

    public function store(Request $request)
    {
        $data = new Laundry();
        $data->user_id = Auth::user()->id;
        $data->tanggal = Carbon::now()->setTimezone('Asia/Jakarta');
        $data->berat = $request->berat;
        $data->tarif = $request->berat*6;
        $data->status = "Menunggu";
        $data->save();

        return redirect()->route('laundry.index')->with('success', 'Data berhasil ditambah');
    }

    public function detail($id)
    {
        $laundry = Laundry::where('id', $id)->first();
        return view('laundry.detail', compact('laundry'));
    }

    public function edit($id)
    {
        $laundry = Laundry::where('id', $id)->first();
        return view('laundry.edit', compact('laundry'));
    }

    public function update(Request $request, $id)
    {
        $laundry = Laundry::where('id', $id)->first();
        $laundry->berat = $request->berat;
        $laundry->tarif = $request->berat*6;
        $laundry->update();
        return view('laundry.detail', compact('laundry'))->with('success', 'Tarif Telah Diubah');
    }

    public function updateStatus($id)
    {
        $data = Laundry::where('id', $id)->first();
        $data->status = 'Selesai';
        $data->update();
        return redirect()->back()->with('success', 'Transaksi Selesai');
    }
}
