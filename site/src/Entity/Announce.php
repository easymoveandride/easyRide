<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnounceRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Announce
{
    use TimeStamps;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var String The title og the announce
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @var Text The description of the announce
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer The number of seats of the announce
     * @ORM\Column(type="integer")
     */
    private $nombreOfSeats;

    /**
     * @var integer The starting point of the announce
     * @ORM\Column(type="string")
     */
    private $startingPoint;

    /**
     * @var integer The ending point of the announce
     * @ORM\Column(type="string")
     */
    private $endingPoint;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

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
     * @return int
     */
    public function getNombreOfSeats(): int
    {
        return $this->nombreOfSeats;
    }

    /**
     * @param int $nombreOfSeats
     */
    public function setNombreOfSeats(int $nombreOfSeats)
    {
        $this->nombreOfSeats = $nombreOfSeats;
    }

    /**
     * @return string
     */
    public function getStartingPoint(): string
    {
        return $this->startingPoint;
    }

    /**
     * @param string $startingPoint
     */
    public function setStartingPoint(string $startingPoint)
    {
        $this->startingPoint = $startingPoint;
    }

    /**
     * @return string
     */
    public function getEndingPoint(): string
    {
        return $this->endingPoint;
    }

    /**
     * @param string $endingPoint
     */
    public function setEndingPoint(string $endingPoint)
    {
        $this->endingPoint = $endingPoint;
    }


}
