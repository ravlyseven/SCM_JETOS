<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Restaurant;
use App\Menu;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menus = Menu::all();
        return view('menu/index', compact('menus'));
    }

    public function create()
    {
        return view('menu/create');
    }

    public function store(Request $request)
    {
        if($request->name == null){
            return back()->withInput()->with('warning', 'Mohon Isi Semua Form');}
        elseif($request->price == null){
            return back()->withInput()->with('warning', 'Mohon Isi Semua Form');}
        elseif($request->description == null){
            return back()->withInput()->with('warning', 'Mohon Isi Semua Form');}

        $data = new Menu();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        if($request->hasFile('photo'))
        {
            $this->validate($request, ['photo' => 'required|image|mimes:jpeg,jpg,png,gif']);
            $photo = $request->file('photo')->store('menu', 'public');
            $data->photo = $photo;
        }
        $data->save();
        return redirect('menu')->with('success', 'Menu Berhasil Ditambahkan');
    }

    public function show(Menu $menu)
    {
        return view('menu/show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view ('menu/edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        if($request->name == null){
            return back()->with('warning', 'Mohon Isi Semua Form');}
        elseif($request->price == null){
            return back()->with('warning', 'Mohon Isi Semua Form');}
        elseif($request->description == null){
            return back()->with('warning', 'Mohon Isi Semua Form');}

        $data = Menu::findOrFail($id);
        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->description = $request->get('description');
        if($request->hasFile('photo'))
        {
            $this->validate($request, ['photo' => 'required|image|mimes:jpeg,jpg,png,gif']);
            if ($data->photo && file_exists(storage_path('app/public/'.$data->photo))) {
                Storage::delete('public', $data->photo);
            }
            $photo = $request->file('photo')->store('menu', 'public');
            $data->photo = $photo;
        }
        $data->save();
        return redirect('menu')->with('success', 'Menu Berhasil Diperbarui');;
    }

    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);
        \Storage::delete('public', $menu->photo);
        return redirect('/menu');
    }
}
