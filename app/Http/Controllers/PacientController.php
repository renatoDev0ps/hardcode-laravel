<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacientRequest;
use App\Http\Resources\PacientCollection;
use App\Http\Resources\PacientTransformer;
use App\Models\Pacient;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\DataArraySerializer;

class PacientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resource = new Collection(
            Pacient::get(),
            new PacientTransformer()
        );

        $manager = new Manager();
        $manager->setSerializer(new DataArraySerializer());

        return $manager->createData($resource)->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pacient $pacient)
    {
        $resource = new Item(
            $pacient,
            new PacientTransformer()
        );

        $manager = new Manager();
        $manager->setSerializer(new DataArraySerializer());

        return $manager->createData($resource)->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacientRequest $request, Pacient $pacient)
    {
        $pacient->create($request->all());

        return response($pacient, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacientRequest $request, Pacient $pacient)
    {
        $pacient->update($request->all());

        return response($pacient, 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacient $pacient)
    {
        $pacient->delete();

        return response(['message' => 200]);
    }
}
