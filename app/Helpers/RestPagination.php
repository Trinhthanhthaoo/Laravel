<?php

namespace App\Helpers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RestPagination
{
    public static function parse(LengthAwarePaginator $pagination)
    {
        return [
            'from' => intval($pagination->firstItem() ?? 0),
            'to' => intval($pagination->lastItem() ?? 0),
            'page' => intval($pagination->currentPage()),
            'limit' => intval($pagination->perPage()),
            'total' => intval($pagination->total()),
            'totalPage' => intval($pagination->lastPage()),
            'items' => $pagination->items(),
        ];
    }
}
