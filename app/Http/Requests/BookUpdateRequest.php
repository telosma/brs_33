<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookUpdateRequest extends Request
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
            'id' => 'required|numeric',
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'published_at' => 'date_format:' . config('common.publish_date_format'),
            'book_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
