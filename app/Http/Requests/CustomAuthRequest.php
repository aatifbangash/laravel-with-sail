<?php
/**
 * Note:-
 * $ sail artisan make:request CustomAuthRequest // Run the following to create custom Form Request class
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // dd(auth()->guest());
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
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ];
    }

    /**
     * To define custom messages for the validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required to fill in!',
            'name.required' => 'Name is required for registration!',
            'password.required' => 'Password is required!'
        ];
    }
}