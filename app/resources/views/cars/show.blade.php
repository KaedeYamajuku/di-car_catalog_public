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

        <div class="pt-5">
            @if($car->users->where('id', \Illuminate\Support\Facades\Auth::id() ?? 1)->isEmpty())
                {{Form::button('いいね', ['class' => 'btn btn-outline-success favoriteButton', 'data-favorite' => 1])}}
            @else
                {{Form::button('いいね済み', ['class' => 'btn btn-success favoriteButton', 'data-favorite' => 0])}}
            @endif
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $('.favoriteButton').on('click', function () {
            $button = $(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('cars.favorite') }}",
                data: {
                    'car_id': {{ $car->id }},
                    'user_id': {{ \Illuminate\Support\Facades\Auth::id() ?? 1 }},
                    'is_favorite': $button.data('favorite'),
                },
                success: function () {
                    if($button.data('favorite') === 1){
                        $button.removeClass('btn-outline-success');
                        $button.addClass('btn-success');
                        $button.text('いいね済み');
                        $button.data('favorite', 0);
                    } else {
                        $button.removeClass('btn-success');
                        $button.addClass('btn-outline-success');
                        $button.text('いいね');
                        $button.data('favorite', 1);
                    }
                }
            })
        })
    </script>
@endsection


