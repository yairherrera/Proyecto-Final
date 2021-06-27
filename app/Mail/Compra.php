<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Compra extends Mailable
{
    use Queueable, SerializesModels;

    public $compra;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($compra)
    {
        $this->compra = $compra;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Compra Realizada')

                    ->view('mail.compra');
    }
}
