<?php
namespace Opencart\Catalog\Controller\CustomCode\Components\Shared\Block\Icon;
/**
 * Class Icon
 *
 * @package Opencart\Catalog\Controller\Common
 */
class IconTemplate extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(array $inputData): string {
            $sizes = [
               'small' => '12px',
               'medium' => '16px',
               'large' => '24px',
            ];

            if (isset($inputData['size']) && isset($sizes[$inputData['size']])) {
    			$data['size'] = $sizes[$inputData['size']];
    		} else {
    			$data['size'] = $sizes['medium'];
    		}


            if($inputData['name'] == 'cart') {
                return $this->load->view('custom_code/components/shared/ui/icons/cart', $data);
            }
            if($inputData['name'] == 'orders') {
                return $this->load->view('custom_code/components/shared/ui/icons/orders', $data);
            }
            if($inputData['name'] == 'user') {
                return $this->load->view('custom_code/components/shared/ui/icons/user', $data);
            }
            if($inputData['name'] == 'favorites') {
                return $this->load->view('custom_code/components/shared/ui/icons/favorites', $data);
            }
    		return $this->load->view('custom_code/components/shared/ui/icons/cart', $data);
    	}
}
