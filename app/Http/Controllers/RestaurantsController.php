<?php

namespace App\Http\Controllers;

use App\Restaurants;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->menu_id) && $request->menu_id !== 0)
            $restaurants = \App\Restaurants::where('menu_id', $request->menu_id)->orderBy('title')->get();
        else
            $restaurants = \App\Restaurants::orderBy('title')->get();
        $menus = \App\Menus::orderBy('title')->get();
        return view('restaurants.index', ['restaurants' => $restaurants, 'menus' => $menus]);
    }
    public function create()
    {
        $menus = \App\Menus::orderBy('title')->get();
        return view('restaurants.create', ['menus' => $menus]);
    }
    public function store(Request $request)
    {
        $restaurant = new Restaurants();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $restaurant->fill($request->all());
        $restaurant->save();
        return redirect()->route('restaurants.index');
    }
    public function show(Restaurants $restaurant)
    {
        //
    }
    public function edit(Restaurants $restaurant)
    {
        $menus = \App\Menus::orderBy('price')->get();
        return view('restaurants.edit', ['restaurant' => $restaurant, 'menus' => $menus]);
    }
    public function update(Request $request, Restaurants $restaurant)
    {
        $restaurant->fill($request->all());
        $restaurant->save();
        return redirect()->route('restaurants.index');
    }
    public function destroy(Restaurants $restaurant, Request $request)
    {
        $restaurant->delete();
        return redirect()->route('restaurants.index', ['menu_id' => $request->input('menu_id')]);
    }

    public function travel($id)
    {
        $restaurant = Restaurants::find($id);
        return view('restaurants.travel', ['restaurant' => $restaurant]);
    }
}
