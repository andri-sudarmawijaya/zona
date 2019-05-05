<?php

namespace Drupal\zona;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Zona entity.
 *
 * @see \Drupal\zona\Entity\Zona.
 */
class ZonaAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\zona\Entity\ZonaInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished zona entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published zona entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit zona entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete zona entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add zona entities');
  }

}
