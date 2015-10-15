<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Request;


class TestEvents extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $data;

    public function __construct($did)
    {
        $request = Request::all();
        $this->data = array(
            'power'=> '10',
            'room' => $did,
            'm'    => $request['m'],
            'from' => "Jane Doe"
        );

    }

    public function broadcastOn()
    {
        return ['test-channel'];
    }
}
