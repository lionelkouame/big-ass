<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

#[ORM\Entity]
#[ORM\Table(name: 'app_ass')]
class Ass implements ResourceInterface
{
    use IdentifiableTrait;

    #[ORM\Column(length: 255)]
    protected ?string $action = null;

    #[ORM\Column]
    protected ?float $porcentage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    protected ?string $description = null;

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getPorcentage(): ?float
    {
        return $this->porcentage;
    }

    public function setPorcentage(float $porcentage): self
    {
        $this->porcentage = $porcentage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
