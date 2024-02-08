<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class  CompanyProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'company_inn' => ['nullable', 'string', 'regex: /^(\d{2}-){4}(\d{2}-)?\d{2}$/'],
            'company_kpp' => ['nullable', 'string', 'regex: /^\d{3}-\d{3}-\d{3}$/'],
            'company_address' => ['nullable', 'string'],
        ];
    }
}