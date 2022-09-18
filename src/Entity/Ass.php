<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: Challenge::class, mappedBy: 'asses')]
    private Collection $challenges;

    public function __construct()
    {
        $this->challenges = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Challenge>
     */
    public function getChallenges(): Collection
    {
        return $this->challenges;
    }

    public function addChallenge(Challenge $challenge): self
    {
        if (!$this->challenges->contains($challenge)) {
            $this->challenges->add($challenge);
            $challenge->addAss($this);
        }

        return $this;
    }

    public function removeChallenge(Challenge $challenge): self
    {
        if ($this->challenges->removeElement($challenge)) {
            $challenge->removeAss($this);
        }

        return $this;
    }
}
