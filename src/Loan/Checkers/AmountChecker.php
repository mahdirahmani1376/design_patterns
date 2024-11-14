<?php

namespace Src\Loan\Checkers;

use Closure;
use Src\Loan\AbstractLoanChecker;
use Src\Loan\LoanCheckInterface;
use Src\Loan\NewLoanRequest;

class AmountChecker extends AbstractLoanChecker implements LoanCheckInterface
{

    public function handle(NewLoanRequest $request): bool
    {
        $check = $this->checkAmount($request->getAmount());

        if (! $check){
            return false;
        }


        return parent::handle($request);
    }

    private function checkAmount(int $amount): bool
    {
        return $amount < 20000000;
    }

}
