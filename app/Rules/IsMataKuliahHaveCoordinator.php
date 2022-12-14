<?php

namespace App\Rules;

use App\Models\Koordinator;
use Illuminate\Contracts\Validation\Rule;

class IsMataKuliahHaveCoordinator implements Rule
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
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $koordinator = Koordinator::where('id_mku', $value)->first();

        return $koordinator ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Mata kuliah tersebut sudah memiliki koordinator';
    }
}
