<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $menu = Menu::all();
      return view('privilege.viewapps', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->name       = $request->menu_name;
        $menu->url        = $request->menu_url;
        $menu->icon       = $request->menu_icon;
        $menu->parent_id  = $request->menu_parent;

        $menu->save();

        return redirect()->route('setup_app.index')->with('message', 'Input Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        return $menu;
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
        $menu = Menu::find($id);
        $menu->name       = $request->menu_name;
        $menu->url        = $request->menu_url;
        $menu->icon       = $request->menu_icon;
        $menu->parent_id  = $request->menu_parent;

        $menu->save();

        return redirect()->route('setup_app.index')->with('message', 'Update Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->route('setup_app.index')->with('message', 'Data telah dihapus');
    }
}
