<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LanguageRequest extends FormRequest
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
            'name'       => ['required','string','min:4',Rule::unique('languages','name')],
            'abbr'       => ['required','string','min:2',Rule::unique('languages','abbr')],
            'directions' => ['required','string','min:3',Rule::in('ltr','rtl')],
//            'active'     => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.min'       =>'لابد ان يكون عدد حروف الاسم اكبر من 4 حروف',
            'unique'      =>'هذا الحقل موجود من قبل داخل قاعده البيانات',
            'required'       =>'لا يجب ان يكون الحقل فارغ',
            'abbr.min'       =>'لابد ان يكون عدد حروف الاختصار اكبر من 4 حروف',
        ];
    }
}
