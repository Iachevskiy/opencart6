<?php
namespace Opencart\Catalog\Controller\CustomCode\Components\Shared\Block\BadgeCounter;
/**
 * Class Icon
 *
 * @package Opencart\Catalog\Controller\Common
 */
class DefaultComponent extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
    public function index(array $inputData): string {

        if (isset($inputData['count'])) {
			$data['count'] = $inputData['count'];
		} else {
			$data['count'] = 0;
		}

        if (isset($inputData['id'])) {
			$data['id'] = $inputData['id'];
		} else {
			$data['id'] = '';
		}

		return $this->load->view('custom_code/components/shared/block/badge_counter/default', $data);
	}
}
