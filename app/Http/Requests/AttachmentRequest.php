<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentRequest extends FormRequest
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
        $attachments = count($_FILES['attachments']['tmp_name']);

        foreach(range(0, $attachments) as $index) {
            $rules['attachments.*' . $index] = 'image|mimes:pdf,png|max:2048';
        }

        return $rules;
    }

    public function persist(){

    }
}
