<?php
namespace Opencart\Catalog\Controller\CustomCode\Components\Features\Navbar;
/**
 * Class Icon
 *
 * @package Opencart\Catalog\Controller\Common
 */
class NavbarPcOrders extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
    public function index(): string {
        $iconData = [
           'size' => 'large',
           'name' => 'orders',
        ];
        $navbarData = [
           'icon' => $this->load->controller('custom_code/components/shared/block/icon/icon_template', $iconData),
           'title'=> 'Заказы'
        ];
        return $this->load->view('custom_code/components/shared/block/navbar/navbar_pc_item_template', $navbarData);
	}
}
