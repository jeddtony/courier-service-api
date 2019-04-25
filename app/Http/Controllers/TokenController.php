<?php

namespace App\Http\Controllers;

use App\Acme\Transformers\TokenTransformer;
use App\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TokenController extends Controller
{

    protected $tokenTransformer;

    function __construct(TokenTransformer $tokenTransformer)
    {
        $this->tokenTransformer = $tokenTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $token = Token::all();
        return Response::json([
            'data' => $this->tokenTransformer->transformCollection( $token->all()),
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
     * @param  \App\Token  $token

     */
    public function show($token)
    {
        //
        $token = Token::find($token);
        if(!$token){
            return Response::json([
                'error' => [
                    'message' => 'Ooops! Data does not exist.'
                ]
            ], 404);
        }
        return Response::json([
            'data' => $this->tokenTransformer->transform($token),
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function edit(Token $token)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Token $token)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function destroy(Token $token)
    {
        //
    }
}
