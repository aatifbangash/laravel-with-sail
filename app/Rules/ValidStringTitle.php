<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidStringTitle implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     * $ php artisan make:rule ValidStringTitle // will create custom rule in app/Rules dir
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     * 
     * following method will validate the $value for $attribute
     */
    public function passes($attribute, $value)
    {
        if (preg_match('/^[A-Za-z ]*$/', $value)) {
            return true;
        }else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a string.';
    }
}
