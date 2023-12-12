<?php

namespace App\Http\Requests;

use App\Http\Response\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChangeBatasHujanStasiunRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:App\Models\StasiunHujanPos,id',
            'new_batas_hujan_ringan' => 'nullable|numeric',
            'new_batas_hujan_sedang' => 'nullable|numeric',
            'new_batas_hujan_berat' => 'nullable|numeric',
        ];
    }

    /**
     * Get the JSON format validation error.
     *
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator): void
    {
        $response = Response::error('Validation error', 400, $validator->errors());
        throw new HttpResponseException(response()->json($response, 400));
    }
}
