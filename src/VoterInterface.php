<?php
/**
 * @file
 * Contains \Drupal\content_entity_example\VoterInterface.
 */

namespace Drupal\slv_manager;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a Contact entity.
 * @ingroup slv_manager
 */
interface VoterInterface extends ContentEntityInterface, EntityOwnerInterface {

}
