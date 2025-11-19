<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Loan;

class OverdueLoans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:overdue-loans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify users about overdue laons';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $loans = Loan::with('user')->whereNull('returned_at')->where('due_at', '<', now())->get();
    }
}
