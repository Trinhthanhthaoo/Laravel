<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

trait PaginationValidateTrait
{
    public static $paginateRules = [
        'page' => 'integer|nullable|min:1',
        'limit' => 'integer|nullable|between:1,1000',
        'keyword' => 'string|nullable',
    ];
    public static $paginateMessages = [];
    public static $paginateAttributes = [
        'page' => 'Trang',
        'limit' => 'Giới hạn',
        'keyword' => 'Từ khóa',
    ];

    public static function paginateValidate($rules = [], $messages = [], $attributes = [])
    {
        $validator = Validator::make(
            request()->all(),
            array_merge(static::$paginateRules, $rules),
            array_merge(static::$paginateMessages, $messages),
            array_merge(static::$paginateAttributes, $attributes)
        );
        if ($validator->fails()) {
            throw new UnprocessableEntityHttpException($validator->errors()->first());
        }
    }
}
