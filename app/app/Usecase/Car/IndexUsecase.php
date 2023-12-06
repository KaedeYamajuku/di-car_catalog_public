<?php

namespace App\Usecase\Car;

use App\Http\Payload;
use App\Http\Requests\Car\IndexRequest;
use App\Models\Car;
use App\Models\Company;

class IndexUsecase
{
    public function run(IndexRequest $request): Payload
    {
        $query = Car::query();

        if($request->get('name') !== null){
            $query->where('name', 'like', "%{$request->get('name')}%");
        }

        if($request->get('cc')){
            $query->where('cc', $request->get('cc'));
        }

        if($request->get('company_id') !== null){
            $query->where('company_id', $request->get('company_id'));
        }

        if($request->get('date_from') !== null && $request->get('date_to') !== null){
            $query->whereBetween('sale_date', [$request->get('date_from'), $request->get('date_to')]);
        }

        $cars = $query->paginate(10);

        $companies = Company::all()->pluck('name', 'id');

        return (new Payload())
            ->setStatus(Payload::SUCCEED)
            ->setOutput(compact('cars', 'companies'));
    }
}
