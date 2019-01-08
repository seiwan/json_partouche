<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateJsonRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'url' => 'required|url|http',
            'reloadTimeout' => 'required|integer|between:0,600',
            'screenOrientation' => 'required',
            'screenSaverTimeout' => 'required|integer|between:0,600',
            'screenSaverDelay' => 'required|integer|between:0,60',
            'screenSaverImage1' => 'required|url|http',
            'screenSaverImage2' => 'required|url|http',
            'screenSaverImage3' => 'required|url|http'
        ];
    }
}
