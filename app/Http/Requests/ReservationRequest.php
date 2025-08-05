<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'table_number' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'phone' => ['required', 'string', 'regex:/^[0-9+\-\s()]+$/', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'start_date' => ['required', 'date', 'after:today'],
            'end_date' => ['required', 'date', 'after:start_date']
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'name.regex' => 'Name can only contain letters and spaces.',
            'phone.regex' => 'Phone number format is invalid.',
            'start_date.after' => 'Reservation date must be in the future.',
            'end_date.after' => 'End date must be after start date.'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => strip_tags($this->name),
            'email' => filter_var($this->email, FILTER_SANITIZE_EMAIL),
            'phone' => preg_replace('/[^0-9+\-\s()]/', '', $this->phone)
        ]);
    }
}
