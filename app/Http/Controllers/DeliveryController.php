<?php

namespace App\Http\Controllers;

use App\Acme\Singletons\CalculateCost;
use App\Acme\Transformers\DeliveryTransformer;
use App\Delivery;
use App\Http\Requests\DeliveryStoreRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Symfony\Component\EventDispatcher\Tests\CallableClass;

class DeliveryController extends Controller
{
    /**
     * @var App\Acme\Transformers\DeliveryTransformer
     */
    protected $deliveryTransformer;

    function __construct(DeliveryTransformer $deliveryTransformer)
    {
        $this->deliveryTransformer = $deliveryTransformer;
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        //
        $delivery = Delivery::all();
        return Response::json([
            'data' => $this->deliveryTransformer->transformCollection( $delivery->all()),
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
     */
    public function store(Request $request)
    {
//        dd($request->header('authorization'));
        //
//        $validate = $request->validated();

        try{
        $delivery = Delivery::create([
            'sender_id' => $request->json()->get('sender_id'),
            'recipient_id' => $request->json()->get('recipient_id'),
            'dispatcher_id' => $request->json()->get('dispatcher_id'),
            'weight' => $request->json()->get('weight'),
            'distance' => $request->json()->get('distance'),
            'cost' => CalculateCost::totalCost($request->json()->get('distance'), $request->json()->get('weight')),
            'status' => $request->json()->get('status'),
        ]);
        $this->sendNotification($delivery);
        return Response::json([
            'data' => [
                'message' => 'Delivery created successfully',
            ]
        ], 201);
    }catch (QueryException $e){
            return Response::json([
                'data' => [
                    'message' => 'Parameters failed validation',
                ]
            ], 422);
    }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     */
    public function show( $delivery)
    {
        //
        $delivery = Delivery::find($delivery);
        if(!$delivery){
            return Response::json([
                'error' => [
                    'message' => 'Ooops! Data does not exist.'
                ]
            ], 404);
        }
        return Response::json([
            'data' => $this->deliveryTransformer->transform($delivery),

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($delivery)
    {
        //
        $delivery = Delivery::find($delivery);
        if(!$delivery){
            return Response::json([
                'error' => [
                    'message' => 'Ooops! Data does not exist.'
                ]
            ], 404);
        }
        return Response::json([
            'data' => $this->deliveryTransformer->transform($delivery),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery

     */
    public function update(Request $request, $delivery)
    {
        $delivery = Delivery::find($delivery);
        if(!$delivery){
            return Response::json([
                'error' => [
                    'message' => 'Ooops! Data does not exist.'
                ]
            ], 404);
        }
        try {
            $delivery->status = $request->json()->get('status');
            $delivery->save();
            $this->sendNotification($delivery);
            return Response::json([
                'data' => [
                    'message' => 'Delivery created successfully',
                ]
            ], 201);
        }
        catch(QueryException $e){
            return Response::json([
                'data' => [
                    'message' => 'Parameters failed validation',
                ]
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
    }

    private function sendNotification($delivery)
    {
        /**        Todo: Here a notification will be sent to the recipient
         *        about the changes made by the sender on either the delivery
         *       this notification can be sent by email or sms
         */
    }
}
