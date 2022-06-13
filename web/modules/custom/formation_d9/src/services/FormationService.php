<?php

namespace Drupal\formation_d9\services;
use Drupal\Core\Entity\EntityTypeManagerInterface;
/**
 * Class FormationService.
 */
class FormationService {
  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;
  /**
   * Constructs a new FormationService object.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }
  public function getSalutation() {
    return "Salut tout le monde";
  }
}
