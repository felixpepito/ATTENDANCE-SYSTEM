<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Role implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value): bool
    {
        // Replace these roles with your valid roles
        $validRoles = ['student', 'teacher'];
        return in_array($value, $validRoles, true);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'The selected role is invalid.';
    }
}
