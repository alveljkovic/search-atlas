<?php

namespace Database\Seeders;

use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PopulateLoansDueAtDate extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loans = Loan::all();

        foreach ($loans as $loan) {
            $loanedAt = Carbon::parse($loan->loaned_at);
            $dueDays = config('loan_config.due_days');

            $dueAt = $loanedAt->addDays($dueDays);

            $loan->due_at = $dueAt;
            $loan->save();
        }
    }
}
