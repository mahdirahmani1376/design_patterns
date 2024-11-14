<?php

namespace Src\Loan\Checkers;

use App\Models\User;
use Closure;
use Src\Loan\AbstractLoanChecker;
use Src\Loan\LoanCheckInterface;
use Src\Loan\NewLoanRequest;

class CheckUserCreditScore extends AbstractLoanChecker implements LoanCheckInterface
{

    public function handle(NewLoanRequest $request): bool
    {

        return parent::handle($request);
    }

}
