<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class GetUserToken extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        try {
            if ($this->auth->parseToken()->authenticate()) {
                return $next($request);
            }
        } catch (TokenExpiredException $e) {
            // return $this->apiReponse(-401, '登录已过期', null);
            try {
                // 刷新用户的 token
                $token = $this->auth->refresh();
                // 使用一次性登录以保证此次请求的成功
                Auth::guard('web')->onceUsingId($this->auth->manager()->getPayloadFactory()->buildClaimsCollection()->toPlainArray()['sub']);
            } catch (JWTException $e) {
                return $this->apiReponse(-402, '缺少登录凭证', null);
            }

        } catch (TokenInvalidException $e) {
            return $this->apiReponse(-403, '登录凭证不合法', null);
        } catch (JWTException $e) {
            return $this->apiReponse(-402, '缺少登录凭证', null);
        }

        return $this->setAuthenticationHeader($next($request), $token);
    }

    public function apiReponse($code,$error,$data)
    {
        $json = [
            'code' => $code,
            'error' => $error,
            'data' => $data
        ];

        return response()->json($json);
    }
}
