<?php
namespace Opencart\Catalog\Controller\CustomCode\Components\Features\Product;
/**
 * Class Icon
 *
 * @package Opencart\Catalog\Controller\Common
 */
class ProductCounter extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
public function index(array $inputData): string {
        $data = [
           'product_id' => '',
           'quantity' => 0,
        ];

        if (isset($inputData['product_id'])) {
        	$data['product_id'] = $inputData['product_id'];
        }

        if (isset($inputData['quantity'])) {
        	$data['quantity'] = $inputData['quantity'];
        }

        return $this->load->view('custom_code/components/features/product/product_counter', $data);
	}
}
