<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginatorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        /* check is a paginate() request */
        if($this->isPaginationRequest($response->getOriginalContent()))
        {
            $response->setData($this->transform($response->getData()));
        }

        return $response;
    }

    private function transform($raw)
    {
        $result = [
            'data' => $raw->response->data,
            'pagination' => null
        ];

        unset($raw->response->data);
        $result['pagination'] = $raw->response;

        return success($result);
    }

    private function isPaginationRequest($content)
    {
        return isset($content['response'])
            && $content['response'] instanceof LengthAwarePaginator;
    }
}