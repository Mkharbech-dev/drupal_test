<?php

namespace Drupal\formation_d9\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *   id = "formation_d9_copyright_block",
 *   admin_label = @Translation("CopyRight Block"),
 *   category = @Translation("Custom")
 * )
 */
class CopyRightBlock extends BlockBase {
    public function build() {
        $date = new \DateTime();
        return [
            '#markup' => t('Copyright @year &copy; Formation Drupal 9', [
              '@year' => $date->format('Y'),
            ]),
        ];
    }
}
