<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Restaurant;
use App\Menu;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurant/index', ['restaurants' => $restaurants]);
    }

    public function create()
    {
        return view('reataurant/create');
    }

    public function store(Request $request)
    {
        $data = new Restaurant();
        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->stock = $request->get('stock');
        $data->weight = $request->get('weight');
        $data->description = $request->get('description');
        if($request->hasFile('photo'))
        {
            $this->validate($request, ['photo' => 'required|image|mimes:jpeg,jpg,png,gif']);
            $photo = $request->file('photo')->store('products', 'public');
            $data->photo = $photo;
        }
        $data->save();
        alert()->success('Create Success', 'Create Restaurant');
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
