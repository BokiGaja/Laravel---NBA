<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $verifyToken;
    public $userName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $verifyToken)
    {
        $this->verifyToken = $verifyToken;
        $this->userName = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.verify', [
            'verifyToken' => $this->verifyToken,
            'userName' => $this->userName
        ]);
    }
}
