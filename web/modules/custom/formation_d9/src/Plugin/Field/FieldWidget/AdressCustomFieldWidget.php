<?php

namespace Drupal\formation_d9\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'adress_custom_field_widget' field type.
 *
 * @FieldWidget(
 *   id = "adress_custom_field_widget",
 *   label = @Translation("Full adress widget"),
 *   description = @Translation("Full adress Field widget"),
 *   field_types = {
 *     "adress_custom_field_type"
 *   }
 * )
 */
class AdressCustomFieldWidget extends WidgetBase {
    /**
     * {@inheritdoc}
     */
  public function formElement(FieldItemListInterface $items, $delta, $element, &$form, FormStateInterface $form_state)
  {
    $element['adress'] = [
      '#type' => 'textarea',
      '#title' => t('Address'),
      '#input' => TRUE,
    ];
    $element['complement'] = [
      '#type' => 'textarea',
      '#title' => t('Complement of address'),
      '#input' => TRUE,
    ];
    return $element;
  }

}
