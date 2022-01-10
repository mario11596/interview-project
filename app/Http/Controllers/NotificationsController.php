<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function notificationIndex(){

        $notifications = auth()->user()->unreadNotifications;
        
        if (Auth::user()->is_company) {
            return view('notifications.indexCompany', compact('notifications'));
        } else {
            return view('notifications.indexCandidate', compact('notifications'));
        }

    }

    public function notificationMark(){

        auth()->user()->unreadNotifications->markAsRead();
        if(Auth::user()->is_company){
            return redirect('/company/notifications');
        } else {
            return redirect('/candidate/notifications');
        }
    }
    
    public function notificationMarkOne($id){
        $notification = auth()->user()
                        ->unreadNotifications
                        ->where('id', $id)
                        ->first();

        if($notification){
            $notification->markAsRead();

            if(Auth::user()->is_company){
                return redirect('/company/notifications');
            } else {
                return redirect('/candidate/notifications');
            }
        }
    }  
}
