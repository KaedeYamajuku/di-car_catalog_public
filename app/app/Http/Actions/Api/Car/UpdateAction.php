<?php

namespace App\Http\Actions\Api\Car;

use App\Http\Requests\Api\Car\UpdateRequest;
use App\Http\Responders\Api\Car\UpdateResponder;
use App\Usecase\Api\Car\UpdateUsecase;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class UpdateAction extends Controller
{
    public function __construct(
        private UpdateUsecase   $usecase,
        private UpdateResponder $responder
    )
    {
    }

    public function __invoke(UpdateRequest $request): Response
    {
        return $this->responder->handle($this->usecase->run($request));
    }
}
