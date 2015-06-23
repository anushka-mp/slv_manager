<?php

/**
 * @file
 * Contains \Drupal\slv_manager\Plugin\views\field\VotersViewLink.
 */

namespace Drupal\slv_manager\Plugin\views\field;

use Drupal\views\ResultRow;

/**
 * Field handler to present a link subscriber edit.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("voter_link_view")
 */
class VotersViewLink extends Link {

  /**
   * Prepares the link to the subscriber.
   *
   * @param \Drupal\slv_manager\VoterInterface $voter
   *   The subscriber entity this field belongs to.
   * @param ResultRow $values
   *   The values retrieved from the view's result set.
   *
   * @return string
   *   Returns a string for the link text.
   */
  protected function renderLink($voter, ResultRow $values) {

    $this->options['alter']['make_link'] = TRUE;
    $this->options['alter']['path'] = "/slv_manager/polling_agent/voter_view/" . $voter->get('polling_booth')->getValue()[0]['value'];
    $this->options['alter']['query'] = drupal_get_destination();

    $text = !empty($this->options['text']) ? $this->options['text'] : $this->t('View Voters');
    return $text;
  }

}
