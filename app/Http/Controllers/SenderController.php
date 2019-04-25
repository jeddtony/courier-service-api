<?php

namespace App\Http\Controllers;

use App\Sender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Acme\Transformers\SenderTransformer;

class SenderController extends Controller
{

    /**
     * @var App\Acme\Transformers\SenderTransformer
     */
    protected $senderTransformer;

    function __construct(SenderTransformer $senderTransformer)
    {
        $this->senderTransformer = $senderTransformer;
    }

    /**
     * Display a listing of the resources
     */
    public function index()
    {
        //
        $senders = Sender::all();
        return Response::json([
            'data' => $this->senderTransformer->transformCollection( $senders->all()),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Display a page for the sender to fill in his details
        // such as name, email, phone_no,
        // return a status code of 201
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
        ]);

        $task = Task::create($request->all());
//
//        return Response::json([
//            'data' =>
//        ])
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sender  $sender
     */
    public function show( $sender)
    {
        //
        $sender = Sender::find($sender);
        if(!$sender){
            return Response::json([
                'error' => [
                    'message' => 'Ooops! Data does not exist.'
                ]
            ], 404);
        }
        return Response::json([
            'data' => $this->senderTransformer->transform($sender),

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function edit(Sender $sender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sender $sender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sender $sender)
    {
        //
    }



}
