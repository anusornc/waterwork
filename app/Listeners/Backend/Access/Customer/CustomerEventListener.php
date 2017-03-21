<?php

namespace App\Listeners\Backend\Access\Customer;

/**
 * Class CustomerEventListener.
 */
class CustomerEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Customer';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->customer->id)
            ->withText('trans("history.backend.customers.created") <strong>'.$event->customer->citizen_id."-".$event->customer->firstname.'</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->customer->id)
            ->withText('trans("history.backend.customers.updated") <strong>'.$event->customer->citizen_id."-".$event->customer->firstname.'</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->customer->id)
            ->withText('trans("history.backend.customers.deleted") <strong>'.$event->customer->citizen_id."-".$event->customer->firstname.'</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Access\Customer\CustomerCreated::class,
            'App\Listeners\Backend\Access\Customer\CustomerEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Access\Customer\CustomerUpdated::class,
            'App\Listeners\Backend\Access\Customer\CustomerEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Access\Customer\CustomerDeleted::class,
            'App\Listeners\Backend\Access\Customer\CustomerEventListener@onDeleted'
        );
    }
}
