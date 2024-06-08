<?php
namespace Opencart\Catalog\Controller\CustomCode\Api\Cart;
/**
 * Class Cart
 *
 * @package Opencart\Catalog\Controller\Checkout
 */
class AddOneProduct extends \Opencart\System\Engine\Controller {

    public function index(): void {

        if (!isset($this->request->post['product_id'])) {
            $json['error'] = 'Отсутствует поле product_id';
            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
        	return;
        }

        $product_id = (int)$this->request->post['product_id'];
        $this->load->model('catalog/product');
        $product = $this->model_catalog_product->getProduct($product_id);

        if (!$product) {
            $json['error'] = 'Продукта с таким id не существует';
            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
            return;
        }

        $this->cart->add($product_id, 1);

        // Unset all shipping and payment methods
		unset($this->session->data['shipping_method']);
		unset($this->session->data['shipping_methods']);
		unset($this->session->data['payment_method']);
		unset($this->session->data['payment_methods']);

		$products = $this->cart->getProductsFast();
		$total_quantity = 0;

        foreach ($products as $product) {
            $total_quantity = $total_quantity + $product['quantity'];
            $product_counter_data = [
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
            ];
            $data['components'][] = $this->load->controller('custom_code/components/features/product/product_counter', $product_counter_data);
        }

        $data['components'][] = $this->load->controller('custom_code/components/entities/cart/badge_counter_cart', $total_quantity);

        $this->response->setOutput($this->load->view('custom_code/api/test_template', $data));
    }
}
