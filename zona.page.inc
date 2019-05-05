<?php

/**
 * @file
 * Contains zona.page.inc.
 *
 * Page callback for Zona entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Zona templates.
 *
 * Default template: zona.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_zona(array &$variables) {
  // Fetch Zona Entity Object.
  $zona = $variables['elements']['#zona'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
