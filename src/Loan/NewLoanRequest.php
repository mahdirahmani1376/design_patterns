<?php

namespace Src\Loan;

class NewLoanRequest
{
    public function __construct(
        private int $userId,
        private int $amount,
        private int $yearsToPayBack,
    )
    {
    }
    public static function createFromArray(array $array): self
    {
        $data = [
            "userId" => $array['user_id'],
            "amount" => $array['amount'],
            "yearsToPayBack" => $array['years_to_pay_back'],
        ];

        return new self(...$data);
    }

    public function getYearsToPayBack(): int
    {
        return $this->yearsToPayBack;
    }

    public function setYearsToPayBack(int $yearsToPayBack): void
    {
        $this->yearsToPayBack = $yearsToPayBack;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }


}
