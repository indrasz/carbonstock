<?php

namespace App\Http\Middleware;

use App\Models\Users;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        $users = Users::where('token', $token)->where('role', 'admin')->get()->count();
        if($users > 0){
            return $next($request);
        }else {
            return response($this->responses(false, 'Anda tidak memiliki akses'));
        }
    }

    function responses($status, $message, $data = array()){
        return json_encode(array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        ));
    }
}
