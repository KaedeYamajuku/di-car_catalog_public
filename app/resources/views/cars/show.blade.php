@extends('app')

@section('main')
    <main class="container">
        <h2 class="p-2">車詳細</h2>

        <div class="row p-2">
            <div class="col-3">車名</div>
            <div class="col-8">{{ $car->name }}</div>
        </div>

        <div class="row p-2">
            <div class="col-3">排気量</div>
            <div class="col-4">{{ $car->cc }}</div>
            <div class="col-5">cc</div>
        </div>

        <div class="row p-2">
            <div class="col-3">販売会社</div>
            <div class="col-8">{{ $car->company->name }}</div>
        </div>

        <div class="row p-2">
            <div class="col-3">発売日</div>
            <div class="col-4">{{ $car->sale_date }}</div>
        </div>

        <div class="row p-2">
            <div class="col-3">memo</div>
            <div class="col-4">{{ $car->memo }}</div>
        </div>

        <div class="row p-2">
            <div class="col-3">画像</div>
            <div class="col-4"><img src="{{ $car->image_url }}"></div>
        </div>

    </main>
@endsection


