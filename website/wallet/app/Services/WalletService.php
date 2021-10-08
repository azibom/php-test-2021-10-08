<?php

namespace App\Services;

use App\Interfaces\WalletServiceInterface;
use App\Interfaces\WalletRepositoryInterface;

class WalletService implements WalletServiceInterface
{
    private $walletRepository;
    public function __construct(WalletRepositoryInterface $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    public function getBalance(int $userId)
    {
        return $this->walletRepository->getBalance($userId);
    }

    public function addMoney(int $userId, int $amount)
    {
        return $this->walletRepository->addMoney($userId, $amount);
    }
}
