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
        $data = new Menu();
        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->description = $request->get('description');
        if($request->hasFile('photo'))
        {
            $this->validate($request, ['photo' => 'required|image|mimes:jpeg,jpg,png,gif']);
            $photo = $request->file('photo')->store('menu', 'public');
            $data->photo = $photo;
        }
        $data->save();
        return redirect('menu');
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
        $data = Product::findOrFail($id);
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
        return redirect('menu');
    }

    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);
        \Storage::delete('public', $menu->photo);
        return redirect('/menu');
    }
}
