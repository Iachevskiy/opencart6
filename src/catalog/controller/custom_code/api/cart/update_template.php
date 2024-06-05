<?php
namespace Opencart\Catalog\Controller\CustomCode\Api\Cart;
/**
 * Class Cart
 *
 * @package Opencart\Catalog\Controller\Checkout
 */
class UpdateTemplate extends \Opencart\System\Engine\Controller {

    public function index(): void {
            $countProducts = $this->cart->countProducts();
            $data['components'][] = $this->load->controller('custom_code/components/entities/cart/badge_counter_cart', $countProducts);

            $this->response->setOutput($this->load->view('custom_code/api/test_template', $data));
    }
}
