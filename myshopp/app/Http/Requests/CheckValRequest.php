<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CheckValRequest extends Request
{
	
    /**
     * Determine if the user is authorized to make this request.
     *判断用户是否有权进入接下来的操作
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
            'title' => 'required',
            'picture'=>'required',
            'descr'=>'required',
            'content'=>'required'
        ];
		
    }
		
    
}
