<?php

namespace SanTran\RouteControl;

use Illuminate\Support\Facades\Facade;

class RouteControlFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'routecontrol';
    }

}
