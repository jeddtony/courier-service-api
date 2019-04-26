<?php

namespace App\Http\Controllers;

use App\Acme\Singletons\TokenGenerator;
use App\Acme\Transformers\TokenTransformer;
use App\Http\Requests\TokenStoreRequest;
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
        return TokenGenerator::generateString();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(TokenStoreRequest $request)
    {
        //
//        dd($request['name']);
//        $validate = $request->validated();
        $token = Token::create($request->all());
        $this->sendNotification($token);
        return Response::json([
            'data' => [
                'message' => 'Token created successfully',
            ]
        ], 201);
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

     */
    public function edit( $token)
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Token  $token

     */
    public function update(Request $request, $token)
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
        $token->token = $request->json()->get('token');
        $token->question = $request->json()->get('question');
        $token->answer = $request->json()->get('answer');
        $token->save();
        $this->sendNotification($token);
        return Response::json([
            'data' => [
                'message' => 'Delivery created successfully',
            ]
        ], 201);
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

    private function sendNotification($token)
    {
/**        Todo: Here a notification will be sent to the recipient
 *        about the changes made by the sender on either the token, question or answer
 *       this notification can be sent by email or sms
 */
    }
}
