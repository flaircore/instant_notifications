<?php

namespace Drupal\instant_notifications\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the instant_notifications module.
 */
class FormIdChannelIdControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "instant_notifications FormIdChannelIdController's controller functionality",
      'description' => 'Test Unit for module instant_notifications and controller FormIdChannelIdController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests instant_notifications functionality.
   */
  public function testFormIdChannelIdController() {
    // Check that the basic functions of module instant_notifications.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
