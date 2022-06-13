<?php

namespace Drupal\formation_d9\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'adress_custom_field_formatter' field type.
 *
 * @FieldFormatter{
 *    id = "adress_custom_field_formatter",
 *    label = @Translation("Address formatter type"),
 *    field_type={
 *      "adress_custom_field_type"
 *    }
 * }
 */
class AdressCustomFormatterType extends FormatterBase {
    public function settingsForm(array $form, FormStateInterface $form_state)
    {
      return [] + parent::settingsForm($form, $form_state);
    }

    public function settingsSummary()
    {
      $summary = [];
      $summary[] = $this->t('');
      return $summary;
    }
    public function viewElements(FieldItemListInterface $items, $langcode)
    {
      $elements = [];
      foreach ($items as $delta => $item) {
          $elements[$delta] = [
              '#type' => 'markup',
              '#markup' => $item->adress . ' - ' . $item->complement
          ];
      }
      return $elements;
    }
}
