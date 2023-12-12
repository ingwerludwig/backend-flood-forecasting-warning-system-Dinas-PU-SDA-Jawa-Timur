<?php

namespace App\Repository;

use App\Models\StasiunAirPos;

class StasiunAirPosRepository
{

    public function changeBatas($request)
    {
        $stasiunAir = StasiunAirPos::find($request->input('id'));
        $stasiunAir->batas_air_siaga = $request->input('new_batas_air_siaga', $stasiunAir->batas_air_siaga);
        $stasiunAir->batas_air_awas = $request->input('new_batas_air_awas', $stasiunAir->batas_air_awas);
        $stasiunAir->save();
        return StasiunAirPos::find($request->input('id'));
    }

    public function getStasiunInformation($request)
    {
        return StasiunAirPos::find($request->input('id'));
    }
}
