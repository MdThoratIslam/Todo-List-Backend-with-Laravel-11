<?php

namespace App\Http\Requests\Task;

use App\Models\Task\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class StoreTaskRequest extends FormRequest
{
    use AuthorizesRequests;

    /**
     * Determine if the User is authorized to make this request.
     */
    public function authorize(): bool
    {
//        $user = auth()->user();
//        // Check if the User has the required permission
//        return $user->hasPermissionTo('task-create') ?? $this->failedAuthorization();
        return true;
    }
    // if authorized, return false then customize the message
    public function failedAuthorization()
    {
        return response()->json(['message' => 'You are not authorized to create a task.'], 403);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'              => 'required|string|max:255',
            'is_completed'      => 'boolean',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'         => 'Task name is required.',
            'name.string'           => 'Task name must be a string.',
            'name.max'              => 'Task name must not be greater than 255 characters.',
            'is_completed.boolean'  => 'Is completed must be a boolean.'
        ];
    }



}
