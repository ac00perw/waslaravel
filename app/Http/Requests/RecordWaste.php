<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RecordWaste extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //should verify logged in user;
        if (\Auth::check() ) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'description' => 'required',
            'waste_type_id' => 'required',
            'weight' => 'required',
        ];
    }

    public function messages(){
        return [
            'waste_type_id.required' => 'Please select the waste type',
            'description.required' => 'Please describe the food',
            'weight.required' => 'Please add weight in ounces'
        ];
    }
}
