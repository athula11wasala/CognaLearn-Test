<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TeacherRequest extends FormRequest
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
        $payload = $this->all();

        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:teachers',
            'phone'  => 'required'
          
        ];
    
        switch (request()->method()) {
		
            
            case 'POST':
               
                break;

            case 'PUT':
              
                break;

            case 'DELETE':
            
                break;

            default:
                # code...
                break;
        }


        
        return $rules;
    }

    public function failedValidation(Validator $validator){

        throw new HttpResponseException( response()->json(["errors" => $validator->errors()], 400));
    }

}
