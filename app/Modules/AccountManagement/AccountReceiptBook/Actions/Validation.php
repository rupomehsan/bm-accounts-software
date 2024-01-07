<?php

namespace App\Modules\AccountManagement\AccountReceiptBook\Actions;

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
        // dd($data);
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
        // dd($this->account_receipt_book);
        return [
            'receipt_book_no' => 'required|unique:account_receipt_books,receipt_book_no,' . $this->account_receipt_book?->id,
            'receipt_start_serial_no' => 'required|unique:account_receipt_books,receipt_start_serial_no,' . $this->account_receipt_book?->id,
            'receipt_end_serial_no' => 'required|unique:account_receipt_books,receipt_end_serial_no,' . $this->account_receipt_book?->id,
            'is_approvel' => 'required|sometimes',
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
