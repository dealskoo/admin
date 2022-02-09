<?php

namespace Dealskoo\Admin\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Slug implements Rule
{
    private $table;
    private $field;
    private $ignore_value;
    private $ignore_field;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $field, $ignore_value = null, $ignore_field = null)
    {
        $this->table = $table;
        $this->field = $field;
        $this->ignore_value = $ignore_value;
        $this->ignore_field = $ignore_field;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (preg_match('/^[\w\d_]+$/i', $value)) {
            $builder = DB::table($this->table)->where($this->field, Str::lower($value));
            if ($this->ignore_value && $this->ignore_field) {
                $builder = $builder->where($this->ignore_field, '!=', $this->ignore_value);
            }
            $row = $builder->first();
            if ($row) {
                return false;
            } else {
                return true;
            }
        } else {
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
        return __('The :attribute must be a slug.');
    }
}
