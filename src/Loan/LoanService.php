<?php

namespace Src\Loan;

use App\Exceptions\LoanNotAllowedException;
use Illuminate\Pipeline\Pipeline;
use Src\Loan\Checkers\AmountChecker;
use Src\Loan\Checkers\CheckUserHasLoan;

class LoanService
{
    public function check(NewLoanRequest $request): bool
    {
        return $this->buildChain()->handle($request);
    }

    private function buildChain(): LoanCheckInterface
    {
        return new AmountChecker(
            new CheckUserHasLoan(

            )
        );
    }
}

