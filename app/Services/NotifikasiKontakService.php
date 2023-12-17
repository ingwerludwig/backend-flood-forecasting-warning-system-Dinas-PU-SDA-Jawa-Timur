<?php

namespace App\Services;

use App\Http\Requests\AddKontakNotifikasiRequest;
use App\Http\Requests\ChangeKontakNotifikasiRequest;

interface NotifikasiKontakService
{
    public function insertKontak(AddKontakNotifikasiRequest $request);
    public function changeKontakInfo(ChangeKontakNotifikasiRequest $request);
    public function getAllKontak();
}
