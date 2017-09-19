<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcLanguage
 *
 * @ORM\Table(name="oc_language", indexes={@ORM\Index(name="name", columns={"name"})})
 * @ORM\Entity
 */
class OcLanguage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $languageId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=5, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=255, nullable=false)
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=64, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="directory", type="string", length=32, nullable=false)
     */
    private $directory;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;


}

