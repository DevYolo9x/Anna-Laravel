<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use App\Models\General;
use Illuminate\Support\Facades\Artisan;

class Maintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $website = General::where(['keyword' => 'homepage_website'])->first();
        $hotline = General::where(['keyword' => 'contact_hotline'])->first();
        $brandname = General::where(['keyword' => 'homepage_brandname'])->first();
        $facebook = General::where(['keyword' => 'social_facebook'])->first();
        if( !empty($website) && $website->content == 1 ){
            return response()->view('errors.maintenance', compact('hotline', 'brandname', 'facebook'), 500);
        } else {
            return $next($request);
        }
    }
}
