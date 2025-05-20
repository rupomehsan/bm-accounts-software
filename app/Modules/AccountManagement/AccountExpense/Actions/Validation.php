<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

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

            'name' => 'required',
            'creator_name' => 'required',
            'description' => 'required',
            'reason' => 'required',
            'account_expense_category_id' => 'required',
            'date' => 'required|sometimes',
            'approved' => 'sometimes',
            'department_id' => 'sometimes',
            'amount' => 'required|sometimes',
            'amount_in_text' => 'required|sometimes',
            'folio' => 'sometimes',
            'image' => request()->isMethod('PATCH') ? 'sometimes' : 'required',
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
