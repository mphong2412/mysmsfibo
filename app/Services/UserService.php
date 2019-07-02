<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserService {
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
		$this->userRepository = $userRepository;
    }

    public function getAuthorization($user_id)
    {
        return $this->userRepository->getAuthorization($user_id);
    }
}
