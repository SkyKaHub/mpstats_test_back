<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Services\SomeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


// TODO: Add Validate and E.T.C.

class NotificationController extends Controller
{

    private $service;

    public function __construct(SomeService $someService) {
        $this->service = $someService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Notification[]|\Illuminate\Database\Eloquent\Collection|Response
     */
    public function index(Notification $notification)
    {
        return $notification->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): Response
    {
        $response = $this->service->create($request->all());
        return new Response($response ? 'Ok' : 'Bad request', $response ? 200 : 400);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return new Response([], 'Ok');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): Response
    {
        $response = $this->service->update($request->all());
        return new Response($response ? 'Ok' : 'Bad request', $response ? 200 : 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $response = $this->service->delete($id);
        return new Response($response ? 'Ok' : 'Bad request', $response ? 200 : 400);
    }
}
