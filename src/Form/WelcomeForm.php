<?php
/**
 * @file
 * Contains Drupal\slv_manager\Form\WelcomeForm.
 */

namespace Drupal\slv_manager\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

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
    return 'slv_manager_welcome';
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
    //$form_state->setRedirect()
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
    $form['contact_settings']['#markup'] = 'Settings form for Voter entity. Manage field settings here.';
    return $form;
  }
}
