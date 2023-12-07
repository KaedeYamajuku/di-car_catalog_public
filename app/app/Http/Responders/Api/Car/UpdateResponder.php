<?php
declare(strict_types=1);

namespace App\Http\Responders\Api\Car;

use App\Http\Payload;
use Illuminate\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;

class UpdateResponder
{
    public function __construct(
        private ResponseFactory $responseFactory
    )
    {
    }

    public function handle(Payload $payload): Response
    {
        if ($payload->getStatus() === Payload::FAILED) {
            return $this->responseFactory->json('更新に失敗しました。', 500);
        }

        return $this->responseFactory->json('更新に成功しました。', 200);
    }
}
