<?php

namespace App\Http\Controllers;

use App\Acme\Transformers\DeliveryTransformer;
use App\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
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
}
