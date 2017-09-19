<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

/**
 * @MappedSuperclass
 * @HasLifecycleCallbacks()
 */
abstract class Entity
{
}