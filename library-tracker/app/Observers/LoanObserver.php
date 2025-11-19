<?php

namespace App\Observers;

use App\Models\Loan;
use Carbon\Carbon;

class LoanObserver
{
    /**
     * Handle the Loan "created" event.
     */
    public function created(Loan $loan): void
    {
        $loanedAt = Carbon::parse($loan->loaned_at);
        $dueDays = config('loan_config.due_days');
        $dueAt = $loanedAt->addDays($dueDays);

        $loan->due_at = $dueAt;
        $loan->save();
    }
}
