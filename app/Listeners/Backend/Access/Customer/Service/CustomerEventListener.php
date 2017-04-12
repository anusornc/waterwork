<?php

namespace App\Listeners\Backend\Access\Customer\Service;

/**
 * Class CustomerServiceEventListener.
 */
class CustomerServiceEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'CustomerService';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->customer_services->id)
            ->withText('trans("history.backend.customers.services.created") <strong>'.$event->customer_services->id.'</strong>')
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
            ->withEntity($event->customer_services->id)
            ->withText('trans("history.backend.customers.services.updated") <strong>'.$event->customer_services->id.'</strong>')
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
            ->withEntity($event->customer_services->id)
            ->withText('trans("history.backend.customers.services.deleted") <strong>'.$event->customer_services->id.'</strong>')
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
            \App\Events\Backend\Access\Customer\Service\CustomerServiceCreated::class,
            'App\Listeners\Backend\Access\Customer\Service\CustomerServiceEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Access\Customer\Service\CustomerServiceUpdated::class,
            'App\Listeners\Backend\Access\Customer\Service\CustomerServiceEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Access\Customer\Service\CustomerServiceDeleted::class,
            'App\Listeners\Backend\Access\Customer\Service\CustomerServiceEventListener@onDeleted'
        );
    }
}
