<?php

namespace Src\Loan;

use Closure;

abstract class AbstractLoanChecker
{
    public function __construct(
        public ?LoanCheckInterface $next = null,
    )
    {
    }

    protected function handle(NewLoanRequest $request): bool
    {
        if (!$this->next) {
            return true;
        }

        return $this->next->handle($request);

    }
}
