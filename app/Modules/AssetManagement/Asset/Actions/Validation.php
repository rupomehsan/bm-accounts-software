<?php

namespace App\Modules\AssetManagement\Asset\Actions;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class Validation extends FormRequest
{
    /**
     * Determine if the  is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * validateError to make this request.
     */
    public function validateError($data)
    {
        $errorPayload =  $data->getMessages();
        return response(['status' => 'validation_error', 'errors' => $errorPayload], 422);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'central_division_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'memo_no' => 'required',
            'memo_date' => 'required',
            'code' => 'required',
            'asset_location' => 'required',
            'asset_owner' => 'required',
            'owner_phone_number' => 'required',
            'depreciation_amount' => 'required',
            'depreciation_type' => 'required',
            'status' => ['sometimes', Rule::in(['active', 'inactive'])],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->validateError($validator->errors()));
        if ($this->wantsJson() || $this->ajax()) {
            throw new HttpResponseException($this->validateError($validator->errors()));
        }
        parent::failedValidation($validator);
    }
}
