<?php

namespace App\Mail;

use App\Models\Internship;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicableInternship extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $internship;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Internship $internship)
    {
        $this->user = $user;
        $this->internship = $internship;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('A new applicable internship for you was found!')
            ->view('emails.new-applicable-internship-notification');
    }
}
