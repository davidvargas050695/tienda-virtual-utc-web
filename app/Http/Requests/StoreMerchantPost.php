<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMerchantPost extends FormRequest
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
        'name'=>'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
        'last_name'=>'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
        'ci'=>'required|numeric|unique:users',
        'address'=>'required',
        'phone'=>'required',
        'email'=>'required|email|unique:users',
       'company_name'=>'required|string',
       'company_ruc'=>'numeric|digits:13',
       'company_address'=>'required',
        'company_type'=>'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
       'company_description'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'ci.unique' => 'El usuario ya existe',
            'ci.required' => 'Este campo es obligatorio',
            'ci.numeric' => 'El campo solo acepta números',

            'company_ruc.unique' => 'El ruc ya existe',
            'company_ruc.digits' => 'El número debe contener 13 carácteres',
            'company_ruc.numeric' => 'El campo solo acepta números',

            'name.required' => 'Este campo es obligatorio.',
            'name.regex' => 'Este campo debe contener solo letras.',
            'last_name.required' => 'Este campo es obligatorio.',
            'last_name.regex' => 'Este campo debe contener solo letras.',

            'address.required' => 'Este campo es obligatorio.',
            'phone.required' => 'Este campo es obligatorio.',
            'company_address.required' => 'Este campo es obligatorio.',


            'email.email' =>'No es un correo válido.',
            'email.unique' => 'El correo del usuario ya está en uso.',
            'email.required' => 'El correo del usuario es obligatorio.',


            'company_type.required' => 'Este campo es obligatorio.',
            'company_type.regex' => 'Este campo debe contener solo letras.',
            'company_description.required' => 'Este campo es obligatorio.',



        ];
    }
}
