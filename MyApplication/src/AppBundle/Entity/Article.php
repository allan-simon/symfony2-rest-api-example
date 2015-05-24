<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $body;

    /**
     * We'll see later why $title and $body are put by default to ''
     */
    public function __construct($title = '', $body = '')
    {
        $this->title = $title;
        $this->body = $body;
    }

    // Note: at the opposite of the bad habits contracted by those coming
    // from the Java world we don't generate all the setters and getters
    // brainlessly, otherwise you can simply put the properties as public...
    // By not creating them we're sure:
    // that nobody can set the id
    // that we understand why and how we need to add getter and or setter of
    // a property
}
