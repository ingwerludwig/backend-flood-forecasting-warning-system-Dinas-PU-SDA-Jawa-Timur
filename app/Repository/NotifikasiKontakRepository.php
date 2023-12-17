<?php

namespace App\Repository;

use App\Http\Requests\ChangeKontakNotifikasiRequest;
use App\Models\NotifikasiKontak;
use Illuminate\Database\Eloquent\Collection;

class NotifikasiKontakRepository
{

    public function insertKontak($request)
    {
        return NotifikasiKontak::create($request);
    }
    public function changeKontakInfo($request)
    {
        $kontak = NotifikasiKontak::find($request->input('id'));
        if ($request->has('new_nama_kontak'))   {$kontak->nama_kontak = $request->input('new_nama_kontak');}
        if ($request->has('new_no_telp'))       {$kontak->no_telp = $request->input('new_no_telp');}
        $kontak->save();
        return NotifikasiKontak::find($request->input('id'));
    }

    public function getAllKontak(): Collection
    {
        return NotifikasiKontak::all();
    }
}
