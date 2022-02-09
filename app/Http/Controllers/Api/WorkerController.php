<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkerRequest;
use App\Models\Company;
use App\Models\Worker;
use App\Services\WorkerService;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function __construct(WorkerService $service)
    {
        $this->service = $service;
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WorkerRequest $request)
    {
        $attributes = $request->only('search');

        $result = $this->service->all($attributes);

        return $result;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkerRequest $request)
    {
        $attributes = $request->only('first_name','last_name','adress','middle_name','position','phone','company_id');
        $result = $this->service->create($attributes);

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $Worker)
    {
        $result = $this->service->show($Worker);

        return response()->json($result);
    }


    public function update(WorkerRequest $request, Worker $worker)
    {
        $attributes = $request->only('first_name','last_name','adress','middle_name','position','phone','company_id');


        $result = $this->service->update($worker, $attributes);

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        $result = $this->service->delete($worker);

        $result = [
            'success' => $result,
        ];

        return response()->json($result);
    }
}
