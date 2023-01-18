<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
class SessionExpired
{
    protected $session;
    protected $timeout;
     
    public function __construct(Store $session){
        $this->session = $session;
        $this->timeout = config('session.lifetime');
    }
    public function handle(Request $request, Closure $next)
    {
        $isLoggedIn = $request->path() != '/logout';
        if(!session('lastActivityTime')){
            $this->session->put('lastActivityTime', time());
        } elseif(time() - $this->session->get('lastActivityTime') > $this->timeout){
            $this->session->forget('lastActivityTime');
            cookie('intend', $isLoggedIn ? url()->current() : '/');
            $user = User::find(session()->get('key')['id']);
            if (isset($user) && $user->type == 2 && Order::where('user_id', $user->id)->count() == 0){
                $user->delete();
            }
            auth()->logout();
            session()->forget('key');
            return redirect()->route('home');
        }
        $isLoggedIn ? $this->session->put('lastActivityTime', time()) : $this->session->forget('lastActivityTime');
        return $next($request);
    }
}