<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Searches\ClientSearch;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $status = $request->get('status');
        $client_source = $request->get('client_source');
        $created_at = $request->get('created_at');
        $model = ClientSearch::searching($id, $name, $status, $client_source, $created_at);

        return view('client.index', [
            'models' => $model
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * @param ClientRequest $request
     */
    public function store(Request $request)
    {
        $request->validate([
                'name' => ['required', 'string'],
                'status' => ['required', 'integer']
        ]);
        $client = new Client();
        $client->name = $request->input('name');
        $client->status = $request->input('status');
        if ($request->input('status') == Client::STATUS_PAUSED) {
            $client->paused_at = time();
        }
        if ($request->input('status') == Client::STATUS_FINISHED) {
            $client->finished_at = time();
        }
        $client->client_source_id = $request->input('client_source_id');
        $client->skype = $request->input('skype', '');
        $client->email = $request->input('email', '');
        $client->phone = $request->input('phone', '');
        $client->whatsapp = $request->input('whatsapp', '');
        $client->telegram = $request->input('telegram', '');
        if ($client->save()) {
            return redirect()->route('client.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($client)
    {
        $model = Client::find($client);
        return view('client.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($client)
    {
        $model = Client::find($client);
        return view('client.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $client)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'status' => ['required', 'integer']
        ]);
        $client = Client::find($client);
        $client->name = $request->input('name');
        $client->status = $request->input('status');
        if ($request->input('status') == Client::STATUS_PAUSED) {
            $client->paused_at = time();
        }
        if ($request->input('status') == Client::STATUS_FINISHED) {
            $client->finished_at = time();
        }
        $client->client_source_id = $request->input('client_source_id');
        $client->skype = $request->input('skype', '');
        $client->email = $request->input('email', '');
        $client->phone = $request->input('phone', '');
        $client->whatsapp = $request->input('whatsapp', '');
        $client->telegram = $request->input('telegram', '');
        if ($client->save()) {
            return redirect()->route('client.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($client)
    {
        if(Client::find($client)->delete()) {
            return redirect()->route('client.index');
        }
    }
}
