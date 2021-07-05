<?php
namespace App\Http\Repositories;

use App\Http\Controllers\Mail\MailController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PHPUnit\Exception;

class UserRepository
{
    protected $userModel;
    protected $mailController;

    public function __construct(User $user, MailController $mailController)
    {
        $this->userModel = $user;
        $this->mailController = $mailController;
    }

    public function signup($user)
    {
        DB::beginTransaction();
        try {
            $user->save();
            DB::commit();
            $this->mailController->sendMailSignup($user);
            \session()->flash('signup', 'Signup success!');
        } catch (Exception $exception) {
            DB::rollBack();
            \session()->flash('signup', 'Signup fail!');

        }
    }
}

