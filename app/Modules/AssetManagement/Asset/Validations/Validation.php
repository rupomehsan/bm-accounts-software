<?php

namespace App\Modules\AssetManagement\Asset\Validations;

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

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->validateError($validator->errors()));
        if ($this->wantsJson() || $this->ajax()) {
            throw new HttpResponseException($this->validateError($validator->errors()));
        }
        parent::failedValidation($validator);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'central_division_id' => 'required | sometimes',
            'title' => 'required | sometimes',
            'asset_categories_id' => 'required | sometimes',
            'description' => 'required | sometimes',
            'price' => 'required | sometimes',
            'memo_no' => 'required | sometimes',
            'memo_date' => 'required | sometimes',
            'code' => 'required | sometimes',
            'asset_location' => 'required | sometimes',
            'asset_owner' => 'required | sometimes',
            'owner_phone_number' => 'required | sometimes',
            'depreciation_type' => 'required | sometimes',
            'asset_image' => 'sometimes',
            'voucher_image' => 'sometimes',
            'acceptance_image' => 'sometimes',
            'buying_date' => 'required | sometimes',
            'hand_over_date' => 'required | sometimes',
            'comments' => ' sometimes',
            'cs_quotaiton_image' => 'sometimes',
            'cs_quotation_id' => ' sometimes',
            'asset_quotation_id' => ' sometimes',
            'asset_request_to_cp_id' => ' sometimes',
            'status' => ['sometimes', Rule::in(['active', 'inactive'])],
        ];
    }
}
