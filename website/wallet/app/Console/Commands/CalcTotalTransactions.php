<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CalcTotalTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transactions:calc-total-amount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calc total amount of transactions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $transactionSum = DB::table('transactions')
            ->sum('amount');

        $this->info("Total amount of transactions is " . $transactionSum);
    }
}
