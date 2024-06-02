<?php
namespace Opencart\Catalog\Controller\CustomCode\Components\Features\Navbar;
/**
 * Class Icon
 *
 * @package Opencart\Catalog\Controller\Common
 */
class NavbarPcFavorites extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
    public function index(string $count): string {
        $iconData = [
           'size' => 'large',
           'name' => 'favorites',
        ];

        $navbarData = [
           'icon' => $this->load->controller('custom_code/components/shared/block/icon/icon_template', $iconData),
           'badge' => $this->load->controller('custom_code/components/entities/wishlist/badge_counter_wishlist', $count),
           'title'=> 'Избранное'
        ];
        return $this->load->view('custom_code/components/shared/block/navbar/navbar_pc_item_template', $navbarData);
	}
}
