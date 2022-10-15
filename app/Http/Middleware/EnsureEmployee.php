<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;

class EnsureEmployee
{
    use ResponseTrait;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        $employee =  auth('sanctum')->user();
        $password = Employee::select('password')->where('id', $employee->id)->first();

        if (!$password) {
            return $this->formatResponse(false, ['Invalid permission']);
        }

        if ($password->password == $employee->getAuthPassword()) {
            return $next($request);
        }

        return $this->formatResponse(false, ['Invalid permission']);
    }
}
