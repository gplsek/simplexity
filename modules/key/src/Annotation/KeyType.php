<?php

namespace Drupal\key\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a key type annotation object.
 *
 * @Annotation
 */
class KeyType extends Plugin {

  /**
   * The plugin ID of the key type.
   *
   * @var string
   */
  public $id;

  /**
   * The human-readable name of the key type.
   *
   * @ingroup plugin_translatable
   *
   * @var \Drupal\Core\Annotation\Translation
   */
  public $label;

  /**
   * The description of the key type.
   *
   * @ingroup plugin_translatable
   *
   * @var \Drupal\Core\Annotation\Translation
   */
  public $description;

  /**
   * The group to which this key type belongs.
   *
   * This is the general category of this type of key. Examples include
   * "authentication" and "encryption". The default group is "none".
   *
   * @var string
   */
  public $group = 'none';

  /**
   * The settings to use when a key value can be submitted.
   *
   * This is used to indicate which key input plugin should be used
   * to receive the key value (if the provider accepts a key value).
   * The default key input plugin is text_field.
   *
   * @var array
   */
  public $key_value = [
    'plugin' => 'text_field',
  ];

}
