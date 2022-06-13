<?php

namespace Drupal\formation_d9\Controller;

use Drupal\Core\Controller\ControllerBase;

class DefaultController extends ControllerBase
{
    public function bonjour($nom = null)
    {
        if (!$nom) {
          $service = \Drupal::service('formation_d9.formation_service');
            return [
              '#type' => 'markup',
              '#markup' => $this->t($service->getSalutation()),
              '#title' => $this->t('Page - Bonjour'),
            ];
        }

        return [
          '#type' => 'markup',
          '#markup' => $this->t("Bonjour $nom!"),
          '#title' => $this->t('Page - Bonjour'),
        ];
    }

    public function customPage()
    {
      return [
        '#type' => 'markup',
        '#markup' => $this->t('Page de Routage dynamique'),
        '#title' => $this->t('Page - Routage dynamique'),
      ];
    }
}
