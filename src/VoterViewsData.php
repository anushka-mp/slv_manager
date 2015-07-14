<?php
/**
 * @file
 * Contains \Drupal\slv_manager\SubscriberViewsData.
 */

namespace Drupal\slv_manager;

use Drupal\views\EntityViewsData;

/**
 * Provides the views data for the subscriber entity type.
 */
class VoterViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['voter']['voters_view_link'] = array(
      'field' => array(
        'title' => $this->t('Link to voters'),
        'help' => $this->t('Provide a simple link to voters view.'),
        'id' => 'voter_link_view',
      ),
    );

    return $data;
  }
}
