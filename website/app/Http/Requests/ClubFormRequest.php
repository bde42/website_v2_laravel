<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClubFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO: Implement user authorizations checking
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
            'name'          => 'required|unique:clubs|between:4,255',
            'slug'          => 'required|unique:clubs|between:4,128|alpha-dash',
            'description'   => 'required|min:120',
            'facebook'      => 'active_url',
            'website'       => 'active_url',
            'slack'         => 'alpha-dash|max:128'
        ];
    }
}
