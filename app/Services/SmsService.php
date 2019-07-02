<?php

namespace App\Services;

use App\Repositories\SmsRepository;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SmsService
{
    protected $userRepository;

    public function __construct(SmsRepository $smsRepository)
    {
        $this->smsRepository = $smsRepository;
    }

    public function getContactGroup($value)
    {
        return $this->smsRepository->getContactGroup($value);
    }

    public function getTemplate($iduser)
    {
        return $this->smsRepository->getTemplate($iduser);
    }

    public function getService($iduser)
    {
        return $this->smsRepository->getService($iduser);
    }

    public function getGroup($iduser)
    {
      return $this->smsRepository->getGroup($iduser);
    }
}
