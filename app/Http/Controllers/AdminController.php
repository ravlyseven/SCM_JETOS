<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Admin;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('home');
    }
    
    public function index()
    {
        $ipklpenghuni = Admin::where('user_id', Auth::user()->id)->get();
        $ipkls = Admin::all();
        return view('admin.index', compact('ipklpenghuni', 'ipkls'));
    }

    public function create()
    {
        $parapenghuni = User::where('role', 1)->get();
        return view('admin.create', compact('parapenghuni'));
    }

    public function store(Request $request)
    {
        $data = new Admin();
        $data->user_id = $request->id;
        $data->tanggal = Carbon::now()->setTimezone('Asia/Jakarta');
        $data->total = 180000;
        $data->status = "Menunggu Pembayaran";
        $data->save();

        return redirect()->route('admin.index')->with('success', 'Data berhasil ditambah');
    }

    public function detail($id)
    {
        $ipkl = Admin::where('id', $id)->first();
        return view('admin.detail', compact('ipkl'));
    }

    public function edit($id)
    {
        $ipkl = Admin::where('id', $id)->first();
        return view('admin.edit', compact('ipkl'));
    }

    public function update(Request $request, $id)
    {
        $data = Admin::findOrFail($id);
        $data->status = "Menunggu Verifikasi";
        if($request->hasFile('photo'))
        {
            $this->validate($request, ['photo' => 'required|image|mimes:jpeg,jpg,png,gif']);
            if ($data->photo && file_exists(storage_path('app/public/'.$data->photo))) {
                Storage::delete('public', $data->photo);
            }
            $photo = $request->file('photo')->store('admin', 'public');
            $data->photo = $photo;
        }
        $data->save();
        return redirect()->route('admin.detail', ['data' => $data, 'id' => $id])->with('success', 'Bukti Pembayaran Telah Diterima');
    }
    
    public function updateStatus($id)
    {
        $data = Admin::where('id', $id)->first();
        $data->status = 'Selesai';
        $data->update();
        return redirect()->back()->with('success', 'Transaksi Selesai');
    }
}
