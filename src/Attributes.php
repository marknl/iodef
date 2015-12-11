<?php

namespace Marknl\Iodef;
use Validator;

class Attributes
{
    public static function validate($element, $attributes)
    {
        $object = "Marknl\Iodef\\Elements\\$element";
        $validation = Validator::make($attributes, $object::getRules());

        if ($validation->fails()) {
            foreach ($validation->messages()->all() as $message) {
                echo $message;
            }
            return false;
        }
        return true;
    }
}
