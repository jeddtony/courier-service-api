<?php

namespace App\Http\Controllers;

use App\Recipient;
use Illuminate\Http\Request;
use App\Acme\Transformers\RecipientTransformer;
use Illuminate\Support\Facades\Response;

class RecipientController extends Controller
{
    /**
     * @var App\Acme\Transformers\RecipientTransformer
     */
    protected $recipientTransformer;

    function __construct(RecipientTransformer $recipientTransformer)
    {
        $this->recipientTransformer = $recipientTransformer;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $recipient = Recipient::all();
        return Response::json([
            'data' => $this->recipientTransformer->transformCollection( $recipient->all()),
        ], 200);
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
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function show($recipient)
    {
        //
        $recipient = Recipient::find($recipient);
        if(!$recipient){
            return Response::json([
                'error' => [
                    'message' => 'Ooops! Data does not exist.'
                ]
            ], 404);
        }
        return Response::json([
            'data' => $this->recipientTransformer->transform($recipient),

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipient $recipient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipient $recipient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipient $recipient)
    {
        //
    }
}
