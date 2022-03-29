<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'IDNP' => ['required', 'size:13'],
            'name' => ['required', 'string', 'max:20'],
            'surname' => ['required', 'string', 'max:20'],
            'phone' => ['required', 'string', 'max:15'],
            'group' => ['required', 'string', 'max:8'],
        ];
    }
}
