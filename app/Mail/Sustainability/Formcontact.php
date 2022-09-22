<?php

namespace App\Mail\Sustainability;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Formcontact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Object $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view = $this->subject('Formulario de contacto sostenibilidad')
            ->from('sostenibilidad@obengroup.com', 'Sostenibilidad ObenGroup')
            ->view('emails.sustainability.formcontact')
            ->with('contact', $this->contact);
        return $view;
    }
}
