<?php

namespace App\Http\Requests;

use App\Enum\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'description' => ['required'],
            'priority' => ['required',Rule::in(['low','medium','high'])],
            'status' => [new Enum(StatusEnum::class)],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
