<?php

namespace App\Modules\User\Actions;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class Validation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'full_name' => 'required',
            'email' => 'required|unique:users,email,' . $this->id,
            'password' => 'required',
            'phone' => 'sometimes',
            'uid' => 'sometimes',
            'telegram_name' => 'sometimes',
            'telegram_id' => 'sometimes',
            'image' => 'sometimes',
            'status' => ['sometimes', Rule::in(['active', 'inactive'])],
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'The name field is required'
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
