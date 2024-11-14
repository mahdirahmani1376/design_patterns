<?php

namespace App\Http\Controllers;

use App\Exceptions\LoanNotAllowedException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Loan\LoanService;
use Src\Loan\NewLoanRequest;

class LoanController extends Controller
{
    public function MakeLoanRequest(LoanService $loanService, Request $request): JsonResponse
    {
        /* example: http://localhost:8000/loan?user_id=1&amount=1&years_to_pay_back=1 */
        $data = $request->validate([
            'user_id' => ['int', 'required'],
            'amount' => ['int', 'required'],
            'years_to_pay_back' => ['int', 'required']
        ]);

        $check = $loanService->check(
            NewLoanRequest::createFromArray(
                $data
            )
        );

        $message = $check ? 'you are allowed to receive a loan' : 'your are not allowed to receive a loan';

        return response()->json([
            "message" => $message
        ]);
    }
}
