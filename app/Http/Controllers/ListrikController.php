<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listrik;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ListrikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Listrik $listrik)
    {
        $listrikPenghuni = Listrik::where('id_user', Auth::user()->id)->get();
        $listrikSecurity = Listrik::join('users', 'listriks.id_user', '=', 'users.id')->select('users.*', 'listriks.*')->get();
        return view('listrik.index', compact('listrikPenghuni', 'listrikSecurity'));
    }

    public function create()
    {
        return view('listrik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required', 'string', 'max:20', 'min:20', 'regex:/^[0-9]*$/']
        ]);
        Listrik::create([
            'id_user' => Auth::user()->id,
            'tanggal' => Carbon::now()->setTimezone('Asia/Jakarta'),
            'token' => $request->token,
            'status' => "Menunggu"
        ]);
        return redirect()->route('listrik.index')->with('success', 'Data berhasil ditambah');
    }
}
