<?php

namespace App\Http\Controllers;

use App\Menus;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menuses.index', ['menus' => Menus::orderBy('price')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menus();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $menu->fill($request->all());
        $menu->save();
        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menus  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menus $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menus  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menus $menu)
    {
        return view('menuses.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menus  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menus $menu)
    {
        $menu->fill($request->all());
        $menu->save();
        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menus  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menus $menu, Request $request)
    {
        $menu->delete();
        return redirect()->route('restaurants.index', ['menu_id' => $request->input('menu_id')]);
    }
}
