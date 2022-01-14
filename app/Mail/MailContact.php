<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class MailContact extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        
        $userFrom = User::findOrFail(Auth::id());
        $userFrom_email =  $userFrom->email;
        
        return $this->subject($this->details->title)
                    ->from($userFrom_email)
                    ->markdown('email.emailsSend')
                    ->with('details', $this->details);
    }
}
