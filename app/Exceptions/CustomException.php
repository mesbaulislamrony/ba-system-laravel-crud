<?php

namespace App\Exceptions;

use Throwable;

class CustomException extends \Exception
{
    protected $message;
    protected $code;

    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        $this->message = $message;
        $this->code = $code;
    }

    public function render($request)
    {
        $data['message'] = $this->message;
        $data['code'] = $this->code;
        return response()->json($data, $this->code);
    }
}
