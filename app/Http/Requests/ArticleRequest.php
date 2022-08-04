<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

class ArticleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|unique:articles|max:100',
            'description' => 'required|max:255',
            'body' => 'required'
        ];
        if ($this->method() === 'PATCH') {
            $rules['title'] = [
                'required',
                Rule::unique('articles')->ignore($this->article),
                'max:100'
            ];
        }

        return $rules;
    }

    public function getPublishedAt($is_published)
    {
        if ($is_published) {
            return $published_at = Carbon::today()->toDateString();
        } else {
            return $published_at = null;
        }
    }
}
