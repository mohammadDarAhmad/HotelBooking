<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 * @SWG\Swagger(
 *   @SWG\Info(
 *     title="Hotel system",
 *     version="1.0",
 *     description="This site too book a room available from hotel",
 *     @SWG\Contact(
 *         email="mohammadhamid757@gmail.com"
 *     )
 *   )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
