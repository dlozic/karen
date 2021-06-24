<?php

namespace Modules\Core\Exceptions;
use Exception;
use Illuminate\Support\Facades\Log;

abstract class AppException extends Exception
{
    protected $success = false;
    protected $errors = [];
    protected $errorCode = null;
    protected $httpCode = 400;

    public function __construct($code = null)
    {
        if($code) {
            $this->errorCode = $code;
            $this->addMessageToErrors(__("{$code}"));
            return;
        }

        /* add translated message automatically to every exception, look at {lang}/exceptions.php */
        $this->addMessageToErrors(__("{$this->errorCode}"));
    }

    public function render($request)
    {
        $result = ['success' => $this->success];

        if($this->errorCode) { $result['error_code'] = $this->errorCode; }
        if(!empty($this->errors)) { $result['errors'] = $this->errors; }

        return response()->json($result, $this->httpCode);
    }

    public function report()
    {
        $ip = request()->ip();
        $url = request()->url();
        $errors = $this->errors;
        $userId = auth()->user()->id ?? null;
        $body = request()->input();

        Log::error(compact(
            'ip',
            'url',
            'errors',
            'userId',
            'body'
        ));
    }

    protected function addMessageToErrors($message)
    {
        $this->errors = array_merge($this->errors, ['messages' => [__("exceptions.{$message}")]]);
    }
}
