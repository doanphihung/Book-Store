<?php
namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function signup($request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $avatar = $request->avatar;
        if ($request->hasFile('avatar')) {
            $newNameAvatar = time() . '-' . $request->name . '.' . $avatar->getClientOriginalExtension();
            $request->file('avatar')->storeAs('public/upload_images/images_user', $newNameAvatar);
            $user->avatar = $newNameAvatar;
        }
        $this->userRepo->signup($user);
    }
}
