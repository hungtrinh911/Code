<?php

namespace App\Http\Middleware;

use App\Option;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'web')
    {
        if ($request->method() === 'GET') {
            $segment = $request->segment(1);
            if (in_array($segment, ['en'])) {
                Carbon::setLocale($segment);
                app()->setLocale($segment);
            } else {
                setlocale(LC_TIME, 'vi_VN.utf8');
                Carbon::setLocale(env('LOCALE_DEFAULT'));
                app()->setLocale(env('LOCALE_DEFAULT'));
            }
        }

        // make metatags
        $metatags = new \stdClass();
        $metatags->title = Option::get('site_title');
        $metatags->description = Option::get('site_description');
        $metatags->image = Option::get('site_image');
        Session::put('metatags', $metatags);

        return $next($request);
    }
}
