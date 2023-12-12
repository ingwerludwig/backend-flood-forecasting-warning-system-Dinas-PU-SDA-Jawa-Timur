<?php

namespace App\Http\Requests;

use App\Http\Response\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddKontakNotifikasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'nama_kontak' => 'nullable|string',
            'no_telp' => ['required', 'string', 'phone_number'],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'no_telp.phone_number' => 'Nomor telepon harus dalam format Indonesia (+62) ',
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
