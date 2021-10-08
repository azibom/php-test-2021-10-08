<?php

namespace App\Interfaces;

interface WalletRepositoryInterface
{
    public function getBalance(int $userId);
    public function addMoney(int $userId, int $amount);
}
