<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AdminstorRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
     private $pwd='';
    public function __construct($value)
    {
        $this->pwd=$value;
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
         $Info=\DB::table('vk_adminusers')->where('password',$this->pwd)->first();
		if(isset($Info) && $Info->password == $value)
		{
			return true;
		}else
		{
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
        return '密码错了！';
    }
}
