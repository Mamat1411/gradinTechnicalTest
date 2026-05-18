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
            "employee_code" => [$isUpdate ? 'sometimes' : 'required', 'string', 'min:6', 'max:6'],
            "full_name" => [$isUpdate ? 'sometimes' : 'required', 'string', 'min:3', 'max:100'],
            "email" => [$isUpdate ? 'sometimes' : 'required', 'email:dns'],
            "phone_number" => [$isUpdate ? 'sometimes' : 'required', 'string', 'numeric', 'max_digits:25'],
            "level" => [$isUpdate ? 'sometimes' : 'required', 'in:1,2,3,4,5'],
            "status" => [$isUpdate ? 'sometimes' : 'required', 'string', Rule::enum(EmploymentStatus::cases())],
            "employment_type" => [$isUpdate ? 'sometimes' : 'required', 'string', Rule::enum(EmploymentType::cases())]
        ];
    }
}
