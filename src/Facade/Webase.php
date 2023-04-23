<?php

namespace Yoruchiaki\Webase\Facade;


class Webase extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Yoruchiaki\Webase\Webase::class;
    }
}