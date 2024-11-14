<?php

namespace Src\Loan;

use Closure;

interface LoanCheckInterface
{
    public function handle(NewLoanRequest $request): bool;
}
