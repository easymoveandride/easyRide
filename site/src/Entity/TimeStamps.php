<?php

namespace App\Entity;

trait TimeStamps
{
    /**
     * @var date The date of creation
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var date The date of updated
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\PrePersist()
     */
    public function createdAt()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate()
     */
    public function updatedAt()
    {
        $this->updatedAt = new \DateTime();
    }
}
