<?php

namespace App\Http\Controllers;

use App\Models\ClientSource;
use App\Models\Searches\ClientSearch;
use App\Models\Searches\ClientSourceSearch;
use Illuminate\Http\Request;

class ClientSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $id = $request->get('id');
        $model = ClientSourceSearch::searching($id, $name);
        return view('client-source.index', [
            'models' => $model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client-source.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        $clientSource = new ClientSource();
        $clientSource->name = $request->input('name');
        $clientSource->updated_at = time();
        $clientSource->created_at = time();
        if ($clientSource->save()) {
            return redirect()->route('client-source.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientSource  $clientSource
     * @return \Illuminate\Http\Response
     */
    public function show($clientSource)
    {
        $model = ClientSource::find($clientSource);
        return view('client-source.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientSource  $clientSource
     * @return \Illuminate\Http\Response
     */
    public function edit($clientSource)
    {
        $model = ClientSource::find($clientSource);
        return view('client-source.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientSource  $clientSource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clientSource)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        $clientSource = ClientSource::find($clientSource);
        $clientSource->name = $request->input('name');
        $clientSource->updated_at = time();
        if ($clientSource->save()) {
            return redirect()->route('client-source.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientSource  $clientSource
     * @return \Illuminate\Http\Response
     */
    public function destroy($clientSource)
    {
        if(ClientSource::find($clientSource)->delete()) {
            return redirect()->route('client-source.index');
        }
    }
}
