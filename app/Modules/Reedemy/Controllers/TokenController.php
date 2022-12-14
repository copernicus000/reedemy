<?php

declare(strict_types=1);

namespace App\Modules\Reedemy\Controllers;

use App\Modules\Reedemy\Helpers\FileDownloader;
use App\Modules\Reedemy\Helpers\ResetCode;
use App\Modules\Reedemy\Helpers\VerifyCode;
use App\Modules\Reedemy\Requests\RedeemCodeRequest;
use App\Modules\Reedemy\Services\CodeGeneratorService;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;


class TokenController
{
    public function __construct(
        public CodeGeneratorService $code,
        public FileDownloader $downloader,
        public ResetCode $resetCode,
        public VerifyCode $verify,
    ) {
    }

    public function verify($id, RedeemCodeRequest $request): RedirectResponse|StreamedResponse
    {
        if ($this->verify->isVerified($id, $request)) {
            $response = $this->downloader->download($id);

            $this->resetCode->reset($id);

            return $response;
        }

        return redirect()->back()->withErrors(['msg' => 'The code is invalid']);
    }

    public function confirmPurchase($id): RedirectResponse
    {
        $this->code->generate($id);
        return redirect()->back();
    }


}
