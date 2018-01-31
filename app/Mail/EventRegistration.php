<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EventAttachment;
use App\Event;
use Illuminate\Support\Facades\DB;

class EventRegistration extends Mailable
{
    use Queueable, SerializesModels;
    public $attendee_name;
    public $event;
    public $location;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $attendee_name, Event $event, string $location)
    {
        $this->attendee_name = $attendee_name;
        $this->event = $event;
        $this->location = $location;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $event_id = $this->event['id'];
        $eventAttPaths = DB::table('event_attachments')->where('event_id',"=",$event_id)->pluck('attachment_id');
        $size = count($eventAttPaths);

        for ($i=0; $i < $size; $i++) {
            $fullPath = storage_path().'/app/'.$eventAttPaths[$i];
            $this->attach($fullPath);
        }

        return $this->markdown('emails.eventregistration');
    }
}
