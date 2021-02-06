<?php

namespace App\Http\Controllers;

use App\Repositories\MessagesInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;
use App\Events\MessageWasRecived;

class MessagesController extends Controller
{
    protected $messages;
    
    function __construct(MessagesInterface $messages)
    {
        $this->messages = $messages;
        $this->middleware('auth', ['except' => ['create', 'store', 'show', 'index']]);
        $this->middleware('roles:admin,mod', ['except' => ['create', 'store', 'show', 'index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $messages = $this->messages->getPaginated();

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = $this->messages->store($request);
        
        event(new MessageWasRecived($message));

        return redirect()->route('mensajes.create')->with('info', 'Hemos recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = $this->messages->findById($id);
        
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message =  $this->messages->findById($id);

        return view('messages.edit', compact('message'));
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
        $this->messages->update($request, $id);

        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->messages->destroy($id);
        
        return redirect()->route('mensajes.index');
    }
}
