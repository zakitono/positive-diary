<?php

namespace App\Http\Requests;

use App\Models\Diary;
use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
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
            'date' => 'required|date',
            'note' => 'max: 255',
            'note01' => 'max: 255',
            'note02' => 'max: 255'
        ];
    }
}
