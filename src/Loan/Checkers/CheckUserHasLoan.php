<?php

namespace Src\Loan\Checkers;

use App\Models\User;
use Closure;
use Src\Loan\AbstractLoanChecker;
use Src\Loan\LoanCheckInterface;
use Src\Loan\NewLoanRequest;

class CheckUserHasLoan extends AbstractLoanChecker implements LoanCheckInterface
{

    public function handle(NewLoanRequest $request): bool
    {
        if (
            $this->checkUserHasActiveLoans(
                $request->getUserId()
            )
        )
        {
            return false;
        }


        return parent::handle($request);

    }

    private function checkUserHasActiveLoans($userId): bool
    {
        return User::query()
            ->find($userId)
            ->loans()
            ->exists();
    }
}
