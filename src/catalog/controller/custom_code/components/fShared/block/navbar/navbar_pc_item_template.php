<?php
namespace Opencart\Catalog\Controller\CustomCode\Components\Ui\Navbar;
/**
 * Class Icon
 *
 * @package Opencart\Catalog\Controller\Common
 */
class NavbarPc extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(): string {

        // Wishlist
		if ($this->customer->isLogged()) {
			$this->load->model('account/wishlist');
			$favoritesCount = $this->model_account_wishlist->getTotalWishlist();
		} else {
		    $favoritesCount = isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0;
		}

        $data['navbar_pc_cart'] = $this->load->controller('custom_code/components/ui/navbar/navbar_pc_cart', $this->cart->countProducts());
        $data['navbar_pc_orders'] = $this->load->controller('custom_code/components/ui/navbar/navbar_pc_orders');
        $data['navbar_pc_favorites'] = $this->load->controller('custom_code/components/ui/navbar/navbar_pc_favorites', $favoritesCount);
        $data['navbar_pc_user'] = $this->load->controller('custom_code/components/ui/navbar/navbar_pc_user');

        return $this->load->view('custom_code/components/ui/navbar/navbar_pc', $data);
	}
}
