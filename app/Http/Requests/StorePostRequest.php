<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            // 'title' => 'required|min:3|unique:posts,title,'.$this->post->id,
            // 'title' => 'required|min:3|unique:posts,title',
            'title' => ['required'
                ,'min:3'
                ,Rule::unique('posts')->ignore($this->title, 'title')
            ],
            'description' => 'required|min:10',
            'user_id' => 'required|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
                // 'title.required' => 'override this message',
                // 'title.min' => 'this is a new minimum message',
        ];
    }
}
