<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{
    protected $service;

    public function __construct(CompanyService $service)
    {
        $this->service = $service;
        $this->middleware('auth');

    }

    public function index(CompanyRequest $request)
    {
            $attributes = $request->only('search');

            $result = $this->service->all($attributes);

            return $result;
    }


    public function store(CompanyRequest $request)
    {
        $attributes = $request->only('name','director_name','adress','email','website_link','phone','user_id');

        $result = $this->service->create($attributes);

        return response()->json($result);
    }


    public function show(Company $company)
    {
        $result = $this->service->show($company);

        return response()->json($result);
    }



    public function update(CompanyRequest $request,Company $company)
    {
        $attributes = $request->only('name','director_name','adress','email','website_link','phone','user_id');

        $result = $this->service->update($company, $attributes);

        return response()->json($result);
    }

    public function destroy(Company $company)
    {
        $result = $this->service->delete($company);

        $result = [
            'success' => $result,
        ];

        return response()->json($result);
    }
}
