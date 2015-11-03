<?php

namespace App\Events;

use App\Events\Event;
use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class TestEvents extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $data;

    public function __construct($did , $cid, $name, $id, $m)
    {
        $this->data = array(
            'domain' => $did,
            'channel'=> $cid,
            'm'    => $m,
            'from' => $name,
            'id'   => $id,
            'time' => Carbon::now()->toIso8601String()
    );

    }

    public function broadcastOn()
    {
        return ['test-channel'];
    }
}
