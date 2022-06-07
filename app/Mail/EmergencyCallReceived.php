<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmergencyCallReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $distressCall;

    public function __construct(User $distressCall)
    {
        $this->distressCall = $distressCall;
    }

    public function build()
    {
        return $this->view('users.enviar');
    }
}
