<?php

/*
 * This file is part of the Panda Events Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Panda\Events;

use Panda\Events\Channels\ChannelInterface;
use Panda\Events\Messages\DecoratorInterface;
use Panda\Events\Messages\MessageInterface;

/**
 * Class Subscriber
 * @package Panda\Events
 */
abstract class Subscriber implements SubscriberInterface, DecoratorInterface
{
    /**
     * @var EventInterface
     */
    private $event;

    /**
     * @return string
     */
    abstract public function getIdentifier();

    /**
     * @param ChannelInterface $channel
     *
     * @return string
     */
    abstract public function getIdentifierByChannel(ChannelInterface $channel);

    /**
     * @param MessageInterface $message
     * @param ChannelInterface $channel
     *
     * @return MessageInterface
     */
    abstract public function decorate(MessageInterface $message, ChannelInterface $channel = null);

    /**
     * @param EventInterface   $event
     * @param ChannelInterface $channel
     */
    public function subscribe(EventInterface $event, ChannelInterface $channel)
    {
        $event->subscribe($channel, $this);
        $this->event = $event;
    }

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->event ? $this->event->getIdentifier() : null;
    }
}
