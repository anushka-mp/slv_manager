<?php

/**
 * @file
 * Contains \Drupal\slv_manager\Entity\Controller\SlvManagerListBuilder.
 */

namespace Drupal\slv_manager\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;

/**
 * Provides a list controller for Voter entity.
 *
 * @ingroup slv_manager
 */
class VoterListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   *
   * We override ::render() so that we can add our own content above the table.
   * parent::render() is where EntityListBuilder creates the table using our
   * buildHeader() and buildRow() implementations.
   */
  public function render() {
    $build['description'] = array(
      '#markup' => $this->t('Voters details view <a href="@adminlink">Voters admin page</a>.', array(
        '@adminlink' => \Drupal::urlGenerator()->generateFromRoute('slv_manager.voter_settings'),
      )),
    );
    $build['table'] = parent::render();
    return $build;
  }

  /**
   * {@inheritdoc}
   *
   * Building the header and content lines for the contact list.
   *
   * Calling the parent::buildHeader() adds a column for the possible actions
   * and inserts the 'edit' and 'delete' links as defined for the entity type.
   */
  public function buildHeader() {
    $header['id'] = $this->t('ID');
    $header['name'] = $this->t('Name');
    $header['nic'] = $this->t('NIC');
    $header['gender'] = $this->t('Gender');
    $header['address'] = $this->t('Address');
    $header['district'] = $this->t('District');
    $header['polling_booth'] = $this->t('Polling booth');
    $header['role'] = $this->t('Role');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\slv_manager\Entity\Voter */
    $row['id'] = $entity->id();
    $row['name'] = $entity->link();
    $row['nic'] = $entity->nic->value;
    $row['gender'] = $entity->gender->value;
    $row['address'] = $entity->address->value;
    $row['district'] = $entity->district->value;
    $row['polling_booth'] = $entity->polling_booth->value;
    $row['role'] = $entity->role->value;
    return $row + parent::buildRow($entity);
  }

}
