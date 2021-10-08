<?php

namespace App\Interfaces;

interface WalletServiceInterface
{
    public function getBalance(int $userId);
    public function addMoney(int $userId, int $amount);
}
