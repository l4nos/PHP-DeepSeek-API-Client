<?php

namespace Lanos\DeepSeekClient\Facades;

use Illuminate\Support\Facades\Facade;

class DeepSeek extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Lanos\DeepSeekClient\Interfaces\DeepSeekClientInterface::class;
    }
}
