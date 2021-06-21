<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * Country
 *
 * @ORM\Table(name="countries")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountryRepository")
 * @Serializer\ExclusionPolicy("all")
 */
class Country
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=2)
     * @ORM\Id
     * @Serializer\Expose
     * @Serializer\Groups(groups={"country", "store", "minimal"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Serializer\Expose
     * @Serializer\Groups(groups={"country", "store"})
     */
    private $name;

    /**
     * @var float|null
     *
     * @ORM\Column(name="vat", type="decimal", precision=4, scale=2, nullable=false, options={"default" = "7.00"})
     * @Serializer\Expose
     * @Serializer\Groups(groups={"country", "store"})
     * @Serializer\Type("double")
     * @Assert\NotBlank
     * @Assert\GreaterThan(value="0", message="VAT must be greater than 0")
     */
    private $vat = 7.00;

    /**
     * @var Product[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Product", mappedBy="country")
     */
    private $products;

    use TimestampableTrait;

    /**
     * @param string $id
     * @return Country
     */
    public function setId(string $id): Country
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId() :string
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Country
     */
    public function setName(string $name) :Country
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() :string
    {
        return $this->name;
    }
    /**
     * @return float|null
     */
    public function getVat(): ?float
    {
        return $this->vat;
    }

    /**
     * @param float|null $vat
     * @return Product
     */
    public function setVat(?float $vat): Country
    {
        $this->vat = $vat;
        return $this;
    }
}