<?php

namespace App\Listener;

use App\Event\UserCreated;
use App\Events\UserCreatedEvent;
use App\Models\Department;
use App\Providers\App\Event\UserCreated as EventUserCreated;

class UserCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */ 
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\UserCreated  $event
     * @return void
     */
    public function handle(UserCreatedEvent $eventCreated)
    {
        Department::inRandomOrder()->first()->users()->save($eventCreated->user);
    }
}
