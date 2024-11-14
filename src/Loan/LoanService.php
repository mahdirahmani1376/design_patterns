<?php

namespace Src\Loan;

use Src\Loan\Checkers\AmountChecker;
use Src\Loan\Checkers\CheckUserCreditScore;
use Src\Loan\Checkers\CheckUserHasLoan;
use Src\Loan\Checkers\PayoutMonthCheck;

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
                new PayoutMonthCheck(
                    new CheckUserCreditScore(

                    )
                )
            )
        );
    }
}

