<?php

namespace App\Services;

use Illuminate\Http\Request;

interface StasiunAirPosService
{
    public function changeBatas($request);

    public function getAllStasiun();
}
