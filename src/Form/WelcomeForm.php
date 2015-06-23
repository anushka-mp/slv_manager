<?php
/**
 * @file
 * Contains Drupal\slv_manager\Form\WelcomeForm.
 */

namespace Drupal\slv_manager\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Entity\User;

/**
 * @package Drupal\slv_manager\Form
 * @ingroup slv_manager
 */
class WelcomeForm extends FormBase {
  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'voter_welcome';
  }

  /**
   * Form submission handler.
   *
   * @param FormStateInterface $form
   *   An associative array containing the structure of the form.
   * @param array $form_state
   *   An associative array containing the current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $uid = $this->currentUser()->id();
    $user = User::load($uid);
    $voter = slv_manager_load_voter_by_nic($user->get('field_nic_number')->getValue()[0]);
    if($user->hasRole('agent')){
      $form_state->setRedirect('slv_manager.voter_polling_booth_details', array('polling_booth' => $voter->get('polling_booth')->getValue()[0]['value']));

    }
    if($user->hasRole('manager')){
      $form_state->setRedirect('slv_manager.voter_district_details');

    }
    else {
      $form_state->setRedirect('slv_manager.voter_details', array('slv_manager_voter' => $voter->id()));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * Define the form used for ContentEntityExample settings.
   * @return array
   *   Form definition array.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param FormStateInterface $form_state
   *   An associative array containing the current state of the form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['welcome']['message'] = array(
      '#type' => 'item',
      '#title' => t('Welcome @user', array('@user' => $this->currentUser()->getUsername())),
      '#markup' => t('An email has been sent to you as the registration confirmation, please click the following button to view your details'),
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('My Details'),
    );
    $roles = $this->currentUser()->getRoles();

    if(in_array('agent', $roles)){
      $form['submit']['#value'] = t('My polling booth');
    }

    if(in_array('manager', $roles)){
      $form['submit']['#value'] = t('My District');
    }
    return $form;
  }
}
