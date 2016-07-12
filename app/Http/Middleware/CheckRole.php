<?php
namespace App\Http\Middleware;

// First copy this file into your middleware directoy
use Closure;
use Illuminate\Session\Store;


class CheckRole {

    protected $session;
    protected $timeout = 10;

    public function __construct(Store $session){
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {
        $isLoggedIn = $request->path() != 'logout';
        if(! session('lastActivityTime'))
            $this->session->put('lastActivityTime', time());
        elseif(time() - $this->session->get('lastActivityTime') > $this->timeout){
            $this->session->forget('lastActivityTime');
            auth()->logout();
            $parameters = ['message' => 'Sessão expirada', 'level' => 'danger'];
            return redirect('error')->with($parameters);
        }

        $isLoggedIn ? $this->session->put('lastActivityTime', time()) : $this->session->forget('lastActivityTime');

            // Get the required roles from the route
        $roles = $this->getRequiredRoleForRoute($request->route());
        // Check if a role is required for the route, and
        // if so, ensure that the user has that role.
        if($request->user()->hasRole($roles) || !$roles)
        {
            return $next($request);
        }
        $parameters = ['message' => 'Você não tem permissões para acessar essa parte do sistema!!!', 'level' => 'danger'];
        return redirect('error')->with($parameters);
    }

    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}