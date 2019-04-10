<?php

namespace App\Mail\Files;

use App\File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FileUpdatesRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $file;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(File $file)
    {
        $this->file = $file;
        $this->user = $file->user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your file updates have been rejected')
            ->view('emails.files.updated.rejected');
    }
}
