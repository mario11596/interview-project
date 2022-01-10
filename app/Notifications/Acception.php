<?php

namespace App\Notifications;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Acception extends Notification implements ShouldQueue
{
    use Queueable;
    protected $application;

   
    public function __construct($application)
    {
       
       $this->application = $application;
       
    }
    
   
    public function via($notifiable)
    {
       
        return ['database'];
    }
    
     /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            
            'position' => $this->application->position,
            'city' => $this->application->city,
            'company' => Company::where('company_id', $this->application->company_id)->value('name')

      
        ];
    }
   
     /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            
            'position' => $this->application->position,
            'city' => $this->application->city,
            'company' => Company::where('company_id', $this->application->company_id)->value('name')
           
        ];
    }
}
