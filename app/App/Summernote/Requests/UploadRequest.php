<?php

namespace App\Summernote\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'file' => ['required', 'image', 'mimes:jpeg,bmp,png,gif,jpg', 'max:4096'],
        ];
    }

    public function attributes()
    {
        return [
            'file' => '«загружаемый файл»',
        ];
    }
}
