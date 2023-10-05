<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoSymbol implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (preg_match('/[-!$%^#&*()_+|~=`{}\[\]:";\'<>?,.\/@]/', $value)) {
            $fail("The :attribute field may not contain symbols or special characters.");
        }
    }

}