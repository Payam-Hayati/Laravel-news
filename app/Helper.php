<?php

use Illuminate\Contracts\Session\Session;

function login_validate()
{
    if (request()->session()->get('admin_id', ''))
        return true;
    else
        return false;
}
