<?php

namespace App\Repositories;

//use App\Enums\Post\PostStatusEnum;
use App\Http\DTO\UserData;
//use App\Models\PackageUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{

    public function create(UserData $userData): Model|User
    {
        return User::query()->create($userData->toArray());
    }

    public function getByEmail(string $email): Model|User
    {
        return User::query()->where('email', $email)->first();
    }

 //    public function decrementPublications(User $user): int
//    {
//        /* @var PackageUser $package */
//        $package = $user->packageUsers()
//            ->where('created_at', '>', now()->subMonth())
//            ->where('publications', '>', 0)
//            ->first();
//
//        $package->decrement('publications');
//
//        return $package->publications;
//    }


}
