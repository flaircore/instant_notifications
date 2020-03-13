<?php

namespace Drupal\instant_notifications\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class NotificationForm.
 */
class NotificationForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'notification_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['webhook_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Webhook Url'),
      '#description' => $this->t('The webhook to use with this form'),
      '#maxlength' => 180,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['channels'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Channels'),
      '#description' => $this->t('Enter channels to send notifications to, separated by a comma'),
      '#maxlength' => 128,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

}
