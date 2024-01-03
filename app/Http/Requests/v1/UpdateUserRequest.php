<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if($method == 'PUT'){
            return [
                'username' => ['required'],
                'email'=>['required', 'email'],
                'password'=>['required'],
                'idRole'=>['required'],
            ];
    
        }else{
            return [
                'username' => ['sometimes','required'],
                'email'=>['sometimes','required', 'email'],
                'password'=>['sometimes','required'],
                'idRole'=>['sometimes','required'],
            ];
        }
    }
    protected function prepareForValidation(){
        if($this->idRole){
            $this->merge([
                'id_role' => $this->idRole
            ]);
        }
    }
}
