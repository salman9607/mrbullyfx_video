<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class CheckSubscription
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
        
        if(Auth::check())
        {

        $user = User::find(Auth::id());
    
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', now());
    
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $user->created_at);
    
        $diff_in_days = $to->diffInDays($from);

        if($user->sub_cancelled == 1)
        {
            return redirect()->route('cancelled');
        }
    
        if($diff_in_days > 14 &&  $user->is_approved == 0 && $user->payment_status != 1)
        {
            if($user->free_trail == 1)
            {
                $user->update(['free_trail' => false]);
            }
            return redirect()->route('getSubs');
        }

        elseif($user->payment_status == 1 && $user->is_approved == 0)
        {
            return redirect()->route('confirmPayment');
        }

    
        }

        return $next($request);
    }
}
