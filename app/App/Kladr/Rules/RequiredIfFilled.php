<?php

namespace App\Kladr\Rules;

class RequiredIfFilled
{
    /**
     * The condition that validates the attribute.
     *
     * @var bool
     */
    public bool $condition;

    /**
     * Create a new required validation rule based on a condition.
     *
     * @param $address
     * @param $field
     */
    public function __construct($address, $field)
    {
        if(empty($address)) {
            $this->condition = false;
            return;
        }


        $keys = ['region' => 'region', 'city' => 'city', 'street' => 'street', 'house' => 'house'];

        $isEmpty = true;
        $countFilled = 0;
        foreach ($keys as $key) {
            if(isset($address[$key]) && $address[$key]) {
                $isEmpty = false;
                $countFilled++;
            }
        }

        if($isEmpty || $countFilled == 4) {
            $this->condition = false;
            return;
        }

        if(isset($address[$field]) && $address[$field]) {
            $this->condition = false;
        } else {
            $this->condition = true;
        }
    }

    /**
     * Convert the rule to a validation string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->condition ? 'required' : 'nullable';
    }
}
