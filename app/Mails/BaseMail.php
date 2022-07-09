<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BaseMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected array $data;

    public $tries = 5;

    public function __construct(array $data, $subject, $view, $queue)
    {
        $this->data = $data;
        $this->subject = $subject;
        $this->view = $view;
        $this->onQueue($queue);
    }

    public function build()
    {
        return $this
            ->view($this->view)
            ->subject($this->subject)
            ->with($this->data);
    }

    public function getData(): array
    {
        return $this->data;
    }
}