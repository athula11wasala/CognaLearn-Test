<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CourseRequest extends FormRequest
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
            'name' => 'required|unique:courses',
            'course_code' => 'required|unique:courses',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
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
