<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
            'start_time' => ['nullable', 'date'],
            'end_time' => ['nullable','date'],
            'activity_id' => ['required', 'exists:activities,id'],
            'project_id' => ['nullable', 'exists:projects,id'],
            'notes' => ['nullable', 'text'],
        ];
    }
}
