<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcDownloadDescription
 *
 * @ORM\Table(name="oc_download_description")
 * @ORM\Entity
 */
class OcDownloadDescription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="download_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $downloadId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $languageId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;


}

