<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeDelete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    $user = $request->user();

    if (!$user) {
        return redirect('/login');
    }

    $task = Task::findOrFail($request->route('task'));

    if ($task->user_id !== $user->id) {
        abort(403, 'Unauthorized action.');
    }

    return $next($request);
}

}
