<?php
/**
 * @file
 * Contains Drupal\slv_manager\Form\VoterDetailsForm.
 */

namespace Drupal\slv_manager\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Language\Language;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Form controller for the slv_manager entity edit forms.
 *
 * @ingroup slv_manager
 */
class VoterDetailsForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\slv_manager\Entity\Voter */
    //$form = parent::buildForm($form, $form_state);
    $entity = $this->entity;
    $form['voter']['nic'] = array(
        '#type' => 'item',
        '#title' => t('NIC'),
        '#markup' => $entity->get('nic')->getValue()[0]['value'],
    );
    $form['voter']['first_name'] = array(
      '#type' => 'item',
      '#title' => t('Name'),
      '#markup' => $entity->get('name')->getValue()[0]['value'],
    );
//    $form['voter']['last_name'] = array(
//      '#type' => 'item',
//      '#title' => t('NIC'),
//      '#markup' => $entity->get('nic')->getValue()[0]['value'],
//    );
    $form['voter']['address'] = array(
      '#type' => 'item',
      '#title' => t('Address'),
      '#markup' => $entity->get('address')->getValue()[0]['value'],
    );
    $form['voter']['district'] = array(
      '#type' => 'item',
      '#title' => t('District'),
      '#markup' => $entity->get('district')->getValue()[0]['value'],
    );
    $form['voter']['account'] = array(
      '#type' => 'link',
      '#title' => $this->currentUser()->getUsername(),
      '#url' => new Url('user.page'),
    );

    return $form;
  }
}