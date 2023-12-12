<?php

namespace App\Repository;

use App\Models\StasiunHujanPos;

class StasiunHujanPosRepository
{
    public function changeBatas($request)
    {
        $stasiunAir = StasiunHujanPos::find($request->input('id'));
        $stasiunAir->batas_hujan_ringan = $request->input('new_batas_hujan_ringan', $stasiunAir->batas_hujan_ringan);
        $stasiunAir->batas_hujan_sedang = $request->input('new_batas_hujan_sedang', $stasiunAir->batas_hujan_sedang);
        $stasiunAir->batas_hujan_berat = $request->input('new_batas_hujan_berat', $stasiunAir->batas_hujan_berat);
        $stasiunAir->save();
        return StasiunHujanPos::find($request->input('id'));
    }

    public function getStasiunInformation($request)
    {
        return StasiunHujanPos::find($request->input('id'));
    }
}
