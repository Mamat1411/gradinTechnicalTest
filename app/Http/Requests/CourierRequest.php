<?php

namespace App\Http\Requests;

use App\Enums\EmploymentStatus;
use App\Enums\EmploymentType;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourierRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isUpdate = in_array($this->method(), ['PUT', 'PATCH']);

        return [
            "employee_code" => [$isUpdate ? 'sometimes' : 'required', 'string', 'min:6', 'max:6', Rule::unique('couriers')->ignore($this->courier?->id)],
            "full_name" => [$isUpdate ? 'sometimes' : 'required', 'string', 'min:3', 'max:100'],
            "email" => [$isUpdate ? 'sometimes' : 'required', 'email:dns', Rule::unique('couriers')->ignore($this->courier?->id)],
            "phone_number" => [$isUpdate ? 'sometimes' : 'required', 'string', Rule::unique('couriers')->ignore($this->courier?->id)],
            "level" => [$isUpdate ? 'sometimes' : 'required', 'in:1,2,3,4,5'],
            "status" => [$isUpdate ? 'sometimes' : 'required', 'string', Rule::enum(EmploymentStatus::class)],
            "employment_type" => [$isUpdate ? 'sometimes' : 'required', 'string', Rule::enum(EmploymentType::class)]
        ];
    }
}
