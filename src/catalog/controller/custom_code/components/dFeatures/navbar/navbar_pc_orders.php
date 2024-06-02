<?php
namespace Opencart\Catalog\Controller\CustomCode\Components\dFeatures\Navbar;
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
           'icon' => $this->load->controller('custom_code/components/fShared/block/icon/icon_template', $iconData),
           'title'=> 'Заказы'
        ];
        return $this->load->view('custom_code/components/fShared/block/navbar/navbar_pc_item_template', $navbarData);
	}
}
