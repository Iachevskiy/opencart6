<?php
namespace Opencart\Catalog\Controller\CustomCode\Components\eEntities\Cart;
/**
 * Class Icon
 *
 * @package Opencart\Catalog\Controller\Common
 */
class BadgeCounterCart extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
public function index(string $count): string {
        $badgeData = [
           'count' => $count,
           'id' => 'badge_counter_cart',
        ];

        return $this->load->controller('custom_code/components/fShared/block/badge_counter/default_component', $badgeData);
	}
}
