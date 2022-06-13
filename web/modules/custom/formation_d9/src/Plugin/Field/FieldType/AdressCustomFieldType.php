<?php

namespace Drupal\formation_d9\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'adress_custom_field_type' field type.
 *
 * @FieldType(
 *   id = "adress_custom_field_type",
 *   label = @Translation("Full adress"),
 *   description = @Translation("Full adress Field Type")
 * )
 */
class AdressCustomFieldType extends FieldItemBase {

    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties = [];
        $properties['adress'] = DataDefinition::create('string')
          ->setLabel(t('Adress'));
        $properties['complement'] = DataDefinition::create('string')
          ->setLabel(t('Complement'));

        return $properties;
    }

    /**
     * {@inheritdoc}
     */
    public static function schema(FieldStorageDefinitionInterface $field_definition)
    {
        $columns = [];
        $columns['adress'] = [
        'type' => 'varchar',
        'length' => 255,
        'default' => '0',
      ];
        $columns['complement'] = [
        'type' => 'varchar',
        'length' => 255,
        'default' => '0',
      ];

        return [
          'columns' => $columns,
          'indexes' => [],
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty()
    {
        $isEmpty =
        empty($this->get('adress')->getValue()) &&
        empty($this->get('complement')->getValue());

        return $isEmpty;
    }
}
