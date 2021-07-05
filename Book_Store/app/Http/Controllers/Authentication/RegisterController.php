<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\FormSignupRequest;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function signup(FormSignupRequest $request)
    {
        $this->userService->signup($request);
        return redirect()->route('login.showFormLogin');
    }
}
