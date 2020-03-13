<?php

namespace Drupal\instant_notifications\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class FormIdChannelIdController.
 */
class FormIdChannelIdController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello($name) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: hello with parameter(s): $name'),
    ];
  }
  /**
   * View.
   *
   * @return string
   *   Return Hello string.
   */
  public function View() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: View')
    ];
  }

}
