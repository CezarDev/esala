<?php

namespace App\Listeners;
use Auth;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Admin;
use App\Model\Access;
use Illuminate\Foundation\Auth\User as Authenticatable;
class UserEventSubscriber extends Model
{
   
    public function onUserLogin($event){
        
        
        $user = auth()->user();
        if ($user) {
            auth()->user()->registerAccess();
        }else {
            return null;
        }
         
       // auth()->admin()->registerAccess();
        /*
       if (auth()->guard('admin')) {
            return view('admin');
          
        } elseif (auth()->guard('web')) {
             auth()->user()->registerAccess();
        }
            */  
           
    }
    
 
 
    /**
     * Handle user logout events.
     */

    public function onUserLogout($event){

        $user = auth()->user();
        if ($user) {
            auth()->user()->clearAccess();
        }else {
            return null;
        }
       }
        /*
       if (auth()->guard('admin')) {
            return view('home');
          
        } elseif (auth()->guard('web')) {
             auth()->user()->clearAccess();
        }
        */
    
 
    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */


    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );
 
        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }
 
}

