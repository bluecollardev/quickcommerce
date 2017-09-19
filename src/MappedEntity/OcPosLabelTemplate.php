<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcPosLabelTemplate
 *
 * @ORM\Table(name="oc_pos_label_template")
 * @ORM\Entity
 */
class OcPosLabelTemplate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="label_template_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $labelTemplateId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="top_margin", type="integer", nullable=true)
     */
    private $topMargin = '3';

    /**
     * @var integer
     *
     * @ORM\Column(name="side_margin", type="integer", nullable=true)
     */
    private $sideMargin = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="vertical_pitch", type="integer", nullable=true)
     */
    private $verticalPitch = '22';

    /**
     * @var integer
     *
     * @ORM\Column(name="horizontal_pitch", type="integer", nullable=true)
     */
    private $horizontalPitch = '32';

    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer", nullable=true)
     */
    private $height = '20';

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer", nullable=true)
     */
    private $width = '30';

    /**
     * @var integer
     *
     * @ORM\Column(name="number_across", type="integer", nullable=true)
     */
    private $numberAcross = '3';

    /**
     * @var integer
     *
     * @ORM\Column(name="number_down", type="integer", nullable=true)
     */
    private $numberDown = '5';

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;


}

