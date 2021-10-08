<?php

namespace App\Repositories;

use Exception;
use Throwable;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Interfaces\WalletRepositoryInterface;

class WalletRepository implements WalletRepositoryInterface
{
    public function getBalance(int $userId)
    {
        $balance = Balance::find($userId);
        if (isset($balance)) {
            return $balance->amount;
        }

        return null;
    }

    public function addMoney(int $userId, int $amount)
    {
        DB::beginTransaction();
        try {
            $transaction = new Transaction;
            $transaction->user_id = $userId;
            $transaction->amount = $amount;
            $referenceId = $this->generateReferenceId($userId, $amount);
            $transaction->reference_id = $referenceId;
            $transaction->save();

            $balance = Balance::find($userId);
            if (isset($balance)) {
                $balance->amount = $balance->amount + $amount;
                $balance->save();
            } else {
                $balance = new Balance;
                $balance->user_id = $userId;
                $balance->amount = $amount;
                $balance->save();
            }
            DB::commit();
            return $referenceId;
        } catch (Throwable $th) {
            DB::rollback();
            throw new Exception($th->getMessage());
        }
    }

    private function generateReferenceId(int $userId, int $amount)
    {
        list($msec, $sec) = explode(' ', microtime());
        $time_micro = $sec . substr($msec, 2, 6);

        return hash('sha256',  $userId . $amount . $time_micro);
    }
}
