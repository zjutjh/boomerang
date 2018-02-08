<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class GetUserToken
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
            if (! $user = auth()->setRequest($request)->user()) {
                return $this->apiReponse(-404, '找不到用户', null);
            }
        } catch (TokenExpiredException $e) {
            return $this->apiReponse(-401, '登录已过期', null);
        } catch (TokenInvalidException $e) {
            return $this->apiReponse(-403, '登录凭证不合法', null);
        } catch (JWTException $e) {
            return $this->apiReponse(-402, '缺少登录凭证', null);
        }

        Auth::login($user);



        return $next($request);
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
