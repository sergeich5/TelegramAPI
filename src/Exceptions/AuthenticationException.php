<?php


namespace Sergeich5\Telegram\Exceptions;

use Throwable;

class AuthenticationException extends \Exception
{
    function __construct()
    {
        parent::__construct('Authentication failed', 403);
    }
}