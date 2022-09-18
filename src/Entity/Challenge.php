<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

#[ORM\Entity]
#[ORM\Table(name: 'app_challenge')]
class Challenge implements ResourceInterface
{
    use IdentifiableTrait;

    #[ORM\Column(name: 'label', type: 'text', length: 255)]
    protected $label;

    #[ORM\Column(name: 'started_date', type: 'datetime')]
    protected $startedDate;

    #[ORM\Column(name: 'end_date', type: 'datetime')]
    protected $endDate;



    #[ORM\Column(type: 'text')]
    protected $description;

    #[ORM\Column(name: 'activated', type: 'boolean', nullable: true)]
    protected $activated;

    #[ORM\Column(name: 'total_day', type: 'integer', nullable: true)]
    protected $totalDay;

    #[ORM\ManyToMany(targetEntity: Ass::class, inversedBy: 'challenges')]
    private Collection $asses;

    public function __construct()
    {
        $this->asses = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label): void
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getStartedDate()
    {
        return $this->startedDate;
    }

    /**
     * @param mixed $startedDate
     */
    public function setStartedDate($startedDate): void
    {
        $this->startedDate = $startedDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * @param mixed $activated
     */
    public function setActivated($activated): void
    {
        $this->activated = $activated;
    }

    /**
     * @return mixed
     */
    public function getTotalDay()
    {
        return $this->totalDay;
    }

    /**
     * @param mixed $totalDay
     */
    public function setTotalDay($totalDay): void
    {
        $this->totalDay = $totalDay;
    }

    /**
     * @return Collection<int, Ass>
     */
    public function getAsses(): Collection
    {
        return $this->asses;
    }

    public function addAss(Ass $ass): self
    {
        if (!$this->asses->contains($ass)) {
            $this->asses->add($ass);
        }

        return $this;
    }

    public function removeAss(Ass $ass): self
    {
        $this->asses->removeElement($ass);

        return $this;
    }

    public function __toString(): string
    {
        return $this->label;
    }


}
