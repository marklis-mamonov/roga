<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagsRequest extends FormRequest
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
        return [
            //
        ];
    }

    public function tagsCollection(string $requestTags)
    {
        $tags = explode(",", $requestTags);
        $tags = array_filter(array_map('trim', $tags));
        $tags = collect($tags);
        return $tags;
    }
}
