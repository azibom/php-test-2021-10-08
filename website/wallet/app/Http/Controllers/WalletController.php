<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMoneyRequest;
use App\Http\Requests\GetBalanceRequest;
use App\Interfaces\WalletServiceInterface;

class WalletController extends Controller
{
    const INTERNAL_SERVER_ERROR = 500;

    private $walletService;
    public function __construct(WalletServiceInterface $walletService)
    {
        $this->walletService = $walletService;
    }

    public function getBalance(GetBalanceRequest $request)
    {
        $userId = $request->user_id;

        try {
            $balance = $this->walletService->getBalance($userId);

            return response()->json(['balance' => $balance]);
        } catch (\Throwable $th) {
            return response()->json(['errMessage' => $th->getMessage()], self::INTERNAL_SERVER_ERROR);
        }
    }

    public function addMoney(AddMoneyRequest $request)
    {
        $userId = $request->user_id;
        $amount = $request->amount;

        try {
            $referenceId = $this->walletService->addMoney($userId, $amount);

            return response()->json(['reference_id' => $referenceId]);
        } catch (\Throwable $th) {
            return response()->json(['errMessage' => $th->getMessage()], self::INTERNAL_SERVER_ERROR);
        }
    }
}
