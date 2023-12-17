<?php

namespace App\Http\Controllers;

use App\Http\Response\Response;
use App\Models\WaterLevelAndRainRecord;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use RuntimeException;

class ExcelImportController extends Controller
{
    public function importExcel(Request $request): JsonResponse
    {
        try
        {
            $file = $request->file('file');
            $data = Excel::toCollection([], $file);

            $columnHeaders = $data[0]->toArray()[0];

            $tanggalIndex = array_search('tanggal', $columnHeaders);
            $rcIndex = array_search('RC', $columnHeaders);
            $rlIndex = array_search('RL', $columnHeaders);
            $lpIndex = array_search('LP', $columnHeaders);
            $ldIndex = array_search('LD', $columnHeaders);

            foreach (array_slice($data[0]->toArray(), 1) as $row) {
                $timestamp = Date::excelToDateTimeObject($row[$tanggalIndex])->format('Y-m-d H:i:s');

                WaterLevelAndRainRecord::create([
                    'level_muka_air_purwodadi' => str_replace(',', '.', $row[$lpIndex]),
                    'level_muka_air_dhompo' => str_replace(',', '.', $row[$ldIndex]),
                    'curah_hujan_cendono' => str_replace(',', '.', $row[$rcIndex]),
                    'curah_hujan_lawang' => str_replace(',', '.', $row[$rlIndex]),
                    'tanggal' => $timestamp
                ]);
            }

            return response()->json(Response::success(null, 'Data inserted successfully', 200));
        }

        catch (Exception $e)
        {
            Log::error('Error: ' . $e->getMessage() . ' caused by: ' . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'No previous exception'), ['exception' => $e]);
            throw new RuntimeException($e->getMessage() . ' caused by: ' . $e->getPrevious(), $e->getCode(), $e);
        }
    }

}
