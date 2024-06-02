<?php
namespace Opencart\Catalog\Controller\CustomCode\Components\Features\Navbar;
/**
 * Class Icon
 *
 * @package Opencart\Catalog\Controller\Common
 */
class NavbarPcCart extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
public function index(string $count): string {
        $iconData = [
           'size' => 'large',
           'name' => 'cart',
        ];

        $navbarData = [
           'icon' => $this->load->controller('custom_code/components/shared/block/icon/icon_template', $iconData),
           'badge' => $this->load->controller('custom_code/components/entities/cart/badge_counter_cart', $count),
           'title'=> 'Корзина'
        ];
        return $this->load->view('custom_code/components/shared/block/navbar/navbar_pc_item_template', $navbarData);
	}
}

