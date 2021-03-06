<?php

/**
 * @file
 * Contains \Drupal\migrate_drupal\Tests\Dump\ContentGroup.
 *
 * THIS IS A GENERATED FILE. DO NOT EDIT.
 *
 * @see cores/scripts/dump-database-d6.sh
 * @see https://www.drupal.org/sandbox/benjy/2405029
 */

namespace Drupal\migrate_drupal\Tests\Table;

use Drupal\migrate_drupal\Tests\Dump\Drupal6DumpBase;

/**
 * Generated file to represent the content_group table.
 */
class ContentGroup extends Drupal6DumpBase {

  public function load() {
    $this->createTable("content_group", array(
      'fields' => array(
        'group_type' => array(
          'type' => 'varchar',
          'not null' => TRUE,
          'length' => '32',
          'default' => 'standard',
        ),
        'type_name' => array(
          'type' => 'varchar',
          'not null' => TRUE,
          'length' => '32',
          'default' => '',
        ),
        'group_name' => array(
          'type' => 'varchar',
          'not null' => TRUE,
          'length' => '32',
          'default' => '',
        ),
        'label' => array(
          'type' => 'varchar',
          'not null' => TRUE,
          'length' => '255',
          'default' => '',
        ),
        'settings' => array(
          'type' => 'text',
          'not null' => TRUE,
          'length' => 100,
        ),
        'weight' => array(
          'type' => 'int',
          'not null' => TRUE,
          'length' => '11',
          'default' => '0',
        ),
      ),
      'primary key' => array(
        'type_name',
        'group_name',
      ),
    ));
    $this->database->insert("content_group")->fields(array(
      'group_type',
      'type_name',
      'group_name',
      'label',
      'settings',
      'weight',
    ))
    ->execute();
  }

}
