<?php

namespace App\Usecase\Api\Car;

use App\Http\Payload;
use App\Http\Requests\Api\Car\UpdateRequest;
use App\Models\CarsUser;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateUsecase
{
    public function run(UpdateRequest $request): Payload
    {
        try {
            DB::beginTransaction();

            if ($request->get('is_favorite')) {
                $this->createFavorite($request->get('car_id'), $request->get('user_id'));
            } else {
                $this->deleteFavorite($request->get('user_id'), $request->get('car_id'));
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);

            return (new Payload())
                ->setStatus(Payload::FAILED);
        }

        return (new Payload())
            ->setStatus(Payload::SUCCEED);
    }

    public function createFavorite($carId, $userId): void
    {
        CarsUser::create(
            [
                'car_id' => $carId,
                'user_id' => $userId,
            ]
        );
    }

    public function deleteFavorite($carID, $userID): void
    {
        CarsUser::where('car_id', $carID)
            ->where('user_id', $userID)
            ->delete();
    }
}
