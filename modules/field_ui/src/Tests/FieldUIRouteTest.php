<?php

/**
 * @file
 * Contains \Drupal\field_ui\Tests\FieldUIRouteTest.
 */

namespace Drupal\field_ui\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Tests the functionality of the Field UI route subscriber.
 *
 * @group field_ui
 */
class FieldUIRouteTest extends WebTestBase {

  /**
   * Modules to enable.
   */
  public static $modules = array('entity_test', 'field_ui');

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->drupalLogin($this->rootUser);
  }

  /**
   * Ensures that entity types with bundles do not break following entity types.
   */
  public function testFieldUIRoutes() {
    $this->drupalGet('entity_test_no_id/structure/entity_test/fields');
    $this->assertText('No fields are present yet.');

    $this->drupalGet('admin/config/people/accounts/fields');
    $this->assertTitle('Manage fields | Drupal');
    $this->assertLocalTasks();

    // Test manage display tabs and titles.
    $this->drupalGet('admin/config/people/accounts/display/compact');
    $this->assertResponse(403);

    $this->drupalGet('admin/config/people/accounts/display');
    $this->assertTitle('Manage display | Drupal');
    $this->assertLocalTasks();

    $edit = array('display_modes_custom[compact]' => TRUE);
    $this->drupalPostForm(NULL, $edit, t('Save'));
    $this->drupalGet('admin/config/people/accounts/display/compact');
    $this->assertTitle('Manage display | Drupal');
    $this->assertLocalTasks();

    // Test manage form display tabs and titles.
    $this->drupalGet('admin/config/people/accounts/form-display/register');
    $this->assertResponse(403);

    $this->drupalGet('admin/config/people/accounts/form-display');
    $this->assertTitle('Manage form display | Drupal');
    $this->assertLocalTasks();

    $edit = array('display_modes_custom[register]' => TRUE);
    $this->drupalPostForm(NULL, $edit, t('Save'));
    $this->drupalGet('admin/config/people/accounts/form-display/register');
    $this->assertTitle('Manage form display | Drupal');
    $this->assertLocalTasks();
    $this->assert(count($this->xpath('//ul/li[1]/a[contains(text(), :text)]', array(':text' => 'Default'))) == 1, 'Default secondary tab is in first position.');
  }

  /**
   * Asserts that local tasks exists.
   */
  public function assertLocalTasks() {
    $this->assertLink('Settings');
    $this->assertLink('Manage fields');
    $this->assertLink('Manage display');
    $this->assertLink('Manage form display');
  }

}
