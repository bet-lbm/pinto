<?php

namespace Http\Controllers;

use App\Client;
use App\Http\Requests\CreateClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Client::paginate(10);
        return view('clients/index')->with(['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client= new Client;    
        return view('clients.create')->with(['client'=>$client]);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        $client=Client::create(
            $request->only('dni','name','last_name','address','phone')
        );

        $client->save();
        session()->flash('message','cliente creado');
        return redirect()->route('client_path',['client'=>$client->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('subject.show')->with(['client'=>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit')->with(['client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client,UpdateClientRequest $request)
    {
        $client->update(

            $request->only('dni','name','last_name','address','phone')
        );
        session()->flash('massage','Cliente Actualizado');
        return redirect()->route('client_path',['client'=>$client->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('message','Cliente eliminado!');
        return redirect()->route('clients_path');
    }
}
