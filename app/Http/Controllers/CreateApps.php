<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apps;

class CreateApps extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('privilege/viewapps');
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
        //
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

    function apiApps() {
        $apps = Apps::query();

        return Datatables::of($apps)
                ->AddColumn('created', function($response){
                    $datanya = json_decode($response);

                    if (isset($datanya->created_at)) {
                        if ($datanya->created_at != '' && $datanya->created_at != '0000-00-00 00:00:00') {
                            return date('d-m-Y H:i:s', strtotime($datanya->created_at));
                        } else {
                            return "-";
                        }
                    }
                })
                ->AddColumn('updated', function($response){
                    $datanya = json_decode($response);

                    if (isset($datanya->updated_at)) {
                        if ($datanya->updated_at != '' && $datanya->updated_at != '0000-00-00 00:00:00') {
                            return date('d-m-Y H:i:s', strtotime($datanya->updated_at));
                        } else {
                            return "-";
                        }
                    }
                })
                ->AddColumn('status', function($response) {
                    $datanya = json_decode($response);

                    if ($datanya->isActive == 1) {
                        $isActive = "Active";
                    } else {
                        $isActive = "Inactive";
                    }
                    return $isActive;
                })
                ->AddColumn('action', function($response){
                    return "<a href='#' class='btn btn-xs btn-primary'>View</a> " .
                           "<a href='#' class='btn btn-xs btn-warning'>Edit</a> " .
                           "<a href='#' class='btn btn-xs btn-danger'>Delete</a>";
                })
                ->make(true);
    }
}
