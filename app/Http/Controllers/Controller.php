<?php

namespace App\Http\Controllers;

use App\Traits\PaginationValidateTrait;
use App\Traits\ValidatorCheckTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use PaginationValidateTrait;
    use ValidatorCheckTrait;
}
