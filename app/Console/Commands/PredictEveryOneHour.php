<?php

namespace App\Console\Commands;

use App\Models\WaterLevelAndRainRecord;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Throwable;

class PredictEveryOneHour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:predictevery1hour';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Predict the next 1 hour of height of water surface to Flask';


    public function __construct()
    {
        parent::__construct();
    }


    function generateRandomData($previousTimestamp = null)
    {
        $curahHujanCendono = mt_rand(0, 25) / 100;
        $curahHujanLawang = mt_rand(0, 100) / 100;
        $levelMukaAirPurwodadi = mt_rand(0, 100) / 100;
        $levelMukaAirDhompo = mt_rand(0, 300) / 100;

        $timestamp = ($previousTimestamp === null) ? now() : $previousTimestamp->addHour();
        $formattedTimestamp = $timestamp->format('Y-m-d H:i:s');

        return [
            'curah_hujan_cendono' => $curahHujanCendono,
            'curah_hujan_lawang' => $curahHujanLawang,
            'level_muka_air_purwodadi' => $levelMukaAirPurwodadi,
            'level_muka_air_dhompo' => $levelMukaAirDhompo,
            'tanggal' => $formattedTimestamp,
        ];
    }


    /**
     * Execute the console command.
     * @throws Throwable
     */
    public function handle(): int
    {
        try {
            DB::beginTransaction();
            $tanggalObject = DB::table('awlr_arr_per_jam')
                ->orderBy('tanggal', 'desc')
                ->select('tanggal')
                ->first();

            if ($tanggalObject) {
                $tanggal = $tanggalObject->tanggal;
                $previousTimestamp = Carbon::parse($tanggal);
            }else{
                $previousTimestamp = null;
            }

            $data = $this->generateRandomData($previousTimestamp);
            DB::table('awlr_arr_per_jam')->insert($data);


            $rowCount = DB::table('awlr_arr_per_jam')->count();
            if ($rowCount >= 6) {
                $flask_url = config('app.flask_url');
                $response = Http::post($flask_url);

                if ($response->status() === 200) {
                    $responseData = $response->json();

                    foreach ($responseData as $modelName => $modelData) {

                            foreach ($modelData['predictions'] as $predictedForTime => $prediction) {

                                $parts = explode('_', $modelName);
                                $nama_pos = $parts[0];

                                $threshold = DB::table('stasiun_air')
                                    ->select('batas_air_siaga', 'batas_air_awas')
                                    ->where('stasiun_air.nama_pos', '=', $nama_pos)
                                    ->first();

                                if ($prediction['value'] < $threshold->batas_air_siaga) {
                                    $status = "AMAN";
                                } else if ($prediction['value'] < $threshold->batas_air_awas) {
                                    $status = "SIAGA";
                                } else {
                                    $status = "AWAS";
                                }

                                $existingRecord = DB::table('hasil_prediksi')
                                    ->where('predicted_for_time', $predictedForTime)
                                    ->first();

                                if ($existingRecord) {
                                    DB::table('hasil_prediksi')
                                        ->where('predicted_for_time', $predictedForTime)
                                        ->update([
                                            'prediksi_level_muka_air_purwodadi_lstm' => $modelName === 'purwodadi_lstm' ? $prediction['value'] : $existingRecord->prediksi_level_muka_air_purwodadi_lstm,
                                            'prediksi_level_muka_air_purwodadi_gru' => $modelName === 'purwodadi_gru' ? $prediction['value'] : $existingRecord->prediksi_level_muka_air_purwodadi_gru,
                                            'prediksi_level_muka_air_purwodadi_tcn' => $modelName === 'purwodadi_tcn' ? $prediction['value'] : $existingRecord->prediksi_level_muka_air_purwodadi_tcn,
                                            'prediksi_level_muka_air_dhompo_lstm' => $modelName === 'dhompo_lstm' ? $prediction['value'] : $existingRecord->prediksi_level_muka_air_dhompo_lstm,
                                            'prediksi_level_muka_air_dhompo_gru' => $modelName === 'dhompo_gru' ? $prediction['value'] : $existingRecord->prediksi_level_muka_air_dhompo_gru,
                                            'prediksi_level_muka_air_dhompo_tcn' => $modelName === 'dhompo_tcn' ? $prediction['value'] : $existingRecord->prediksi_level_muka_air_dhompo_tcn,
                                            'status_muka_air' => $existingRecord->status_muka_air,
                                        ]);
                                } else {
                                    DB::table('hasil_prediksi')->insert([
                                        'predicted_for_time' => $predictedForTime,
                                        'predicted_from_time' => $modelData['predicted_from_time'],
                                        'status_muka_air' => null,
                                        'prediksi_level_muka_air_purwodadi_lstm' => $modelName === 'purwodadi_lstm' ? $prediction['value'] : null,
                                        'prediksi_level_muka_air_purwodadi_gru' => $modelName === 'purwodadi_gru' ? $prediction['value'] : null,
                                        'prediksi_level_muka_air_purwodadi_tcn' => $modelName === 'purwodadi_tcn' ? $prediction['value'] : null,
                                        'prediksi_level_muka_air_dhompo_lstm' => $modelName === 'dhompo_lstm' ? $prediction['value'] : null,
                                        'prediksi_level_muka_air_dhompo_gru' => $modelName === 'dhompo_gru' ? $prediction['value'] : null,
                                        'prediksi_level_muka_air_dhompo_tcn' => $modelName === 'dhompo_tcn' ? $prediction['value'] : null,
                                        'status_muka_air' => $status,
                                    ]);
                                }
                            }
                        }
                }
            }

            DB::commit();
            return 0;

        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
