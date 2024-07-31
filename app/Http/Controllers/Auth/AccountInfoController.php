<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Interfaces\AccountServiceInterface as AccountService;
use App\Repositories\Interfaces\AccountRepositoryInterface as AccountRepository;

class AccountInfoController extends Controller
{
    protected $accountService;
    protected $accountRepository;

    public function __construct(
        AccountRepository $accountRepository,
        AccountService $accountService,
    ){
        $this->accountRepository = $accountRepository;

        $this->accountService = $accountService;
    }
    public function show($id){
        $data = Account::with('user')->findOrFail($id);

        // dd($data);
        return view('frontend.account_info', compact('data'));
    }
}
