<?php

namespace Drupal\zona\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Zona entities.
 *
 * @ingroup zona
 */
interface ZonaInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Zona name.
   *
   * @return string
   *   Name of the Zona.
   */
  public function getName();

  /**
   * Sets the Zona name.
   *
   * @param string $name
   *   The Zona name.
   *
   * @return \Drupal\zona\Entity\ZonaInterface
   *   The called Zona entity.
   */
  public function setName($name);

  /**
   * Gets the Zona creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Zona.
   */
  public function getCreatedTime();

  /**
   * Sets the Zona creation timestamp.
   *
   * @param int $timestamp
   *   The Zona creation timestamp.
   *
   * @return \Drupal\zona\Entity\ZonaInterface
   *   The called Zona entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Zona published status indicator.
   *
   * Unpublished Zona are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Zona is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Zona.
   *
   * @param bool $published
   *   TRUE to set this Zona to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\zona\Entity\ZonaInterface
   *   The called Zona entity.
   */
  public function setPublished($published);

}
