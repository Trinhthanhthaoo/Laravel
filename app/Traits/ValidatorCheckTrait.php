<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

trait ValidatorCheckTrait
{
    public static function validatorCheck(Validator $validator)
    {
        if ($validator->fails()) {
            throw new UnprocessableEntityHttpException($validator->errors()->first());
        }
    }
}
