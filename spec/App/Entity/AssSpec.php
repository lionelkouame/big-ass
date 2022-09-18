<?php

namespace spec\App\Entity;

use App\Entity\Ass;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Model\ResourceInterface;


class AssSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Ass::class);
    }

    function it_a_ressource()
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_description_has_nullable()
    {
        $this->getDescription()->shouldReturn(null);

    }

    function it_description_is_mutable()
    {
        $this->setDescription('test');

        $this->getDescription()->shouldReturn('test');
    }

}
