<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RoomCollection extends ResourceCollection
{
    public $collects = RoomResource::class;

}
