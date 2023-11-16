<?php

namespace App\Console\Commands;

use App\Models\HistoryPrediksiMukaAir;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Throwable;
use function Laravel\Prompts\select;

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


    /**
     * Execute the console command.
     * @throws Throwable
     */
    public function handle(): int
    {
        try {
            DB::beginTransaction();
            $flask_url = config('app.flask_url');
            $response = Http::post($flask_url);

            if ($response->status() === 200) {
                $responseData = $response->json();

                foreach ($responseData as $modelName => $modelData) {
                    foreach ($modelData['predictions'] as $predictedForTime => $prediction) {
                        $existingRecord = DB::table('hasil_prediksi')
                            ->where('predicted_for_time', $predictedForTime)
                            ->first();

                        if ($existingRecord) {
                            DB::table('hasil_prediksi')
                                ->where('predicted_for_time', $predictedForTime)
                                ->update([
                                    'prediksi_level_muka_air_purwodadi_lstm' => $modelName === 'purwodadi_lstm' ? $prediction['value'] : $existingRecord->prediksi_level_muka_air_purwodadi_lstm,
                                    'prediksi_level_muka_air_purwodadi_gru' => $modelName === 'purwodadi_gru' ? $prediction['value'] : $existingRecord->prediksi_level_muka_air_purwodadi_gru,
                                    'prediksi_level_muka_air_dhompo_lstm' => $modelName === 'dhompo_lstm' ? $prediction['value'] : $existingRecord->prediksi_level_muka_air_dhompo_lstm,
                                    'prediksi_level_muka_air_dhompo_gru' => $modelName === 'dhompo_gru' ? $prediction['value'] : $existingRecord->prediksi_level_muka_air_dhompo_gru,
                                ]);
                        } else {
                            // Insert a new record
                            DB::table('hasil_prediksi')->insert([
                                'predicted_for_time' => $predictedForTime,
                                'predicted_from_time' => $modelData['predicted_from_time'],
                                'status_muka_air' => null,
                                'prediksi_level_muka_air_purwodadi_lstm' => $modelName === 'purwodadi_lstm' ? $prediction['value'] : null,
                                'prediksi_level_muka_air_purwodadi_gru' => $modelName === 'purwodadi_gru' ? $prediction['value'] : null,
                                'prediksi_level_muka_air_dhompo_lstm' => $modelName === 'dhompo_lstm' ? $prediction['value'] : null,
                                'prediksi_level_muka_air_dhompo_gru' => $modelName === 'dhompo_gru' ? $prediction['value'] : null,
                            ]);
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
