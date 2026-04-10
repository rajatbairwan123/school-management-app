<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class SchoolMiddleware
{
    public function handle($request, Closure $next)
    {
        $slug = $request->route('school');

        $school = School::where('slug', $slug)->first();

        if (!$school) {
            abort(404);
        }

        // If user logged in — check school access
        if (Auth::check()) {

            if (Auth::user()->school_id != $school->id) {

                Auth::logout();

                return redirect("/{$slug}/login")
                    ->with('error', 'Session expired. Please login again.');
            }
        }

        session(['school_id' => $school->id]);

        URL::defaults([
            'school' => $slug
        ]);

        app('url')->defaults([
            'school' => $slug
        ]);

        view()->share('currentSchool', $school);

        return $next($request);
    }
}
