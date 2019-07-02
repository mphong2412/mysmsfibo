<?php

namespace App\Repositories;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Users;
use App\Models\Authorization;

class UserRepository {


	public function __construct(Users $users, Authorization $authorization) {
        $this->users = $users;
        $this->authorization = $authorization;
    }

    public function getAuthorization($id_user)
    {
        try {
            $result = DB::table('authorization as author')
                        ->select('lf.function_name')
                        ->join('list_function as lf','author.function_id', '=', 'lf.id')
                        ->get();
            return $result;
        } catch (\Throwable $th) {
            logger("Failed to get Authorization. user_id " .  $id_user . " message: " . $e->getMessage());
            return null;
        }
    }
}
