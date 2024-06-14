<?php
/**
 * @package   OpenCart
 * @author    Daniel Kerr
 * @copyright Copyright (c) 2005 - 2022, OpenCart, Ltd. (https://www.opencart.com/)
 * @license   https://opensource.org/licenses/GPL-3.0
 * @author    Daniel Kerr
 * @see       https://www.opencart.com
 */
namespace Opencart\System\Library;
/**
 * Class URL
 */
class Url {
	/**
	 * @var string
	 */
	private string $url;
	/**
	 * @var array
	 */
	private array $rewrite = [];

	/**
	 * Constructor.
	 *
	 * @param 	string 	$url
	 */
	public function __construct(string $url) {
		$this->url = $url;
	}

	/**
	 * addRewrite
	 *
	 * Add a rewrite method to the URL system
	 *
	 * @param	object	$rewrite
	 *
	 * @return 	void
	 */
	public function addRewrite(\Opencart\System\Engine\Controller $rewrite): void {
		$this->rewrite[] = $rewrite;
	}

	/**
	 * Generates a URL
	 *
	 * @param 	string        	$route
	 * @param 	string|array	$args
	 * @param 	bool			$js
	 *
	 * @return string
	 */
	public function link(string $route, string|array $args = '', bool $js = false): string {
		$url = $this->url . 'index.php?route=' . $route;

		if ($args) {
			if (is_array($args)) {
				$url .= '&' . http_build_query($args);
			} else {
				$url .= '&' . trim($args, '&');
			}
		}

        // Разбор URL и получение строки запроса
        $parsedUrl = parse_url($url);
        $query = $parsedUrl['query'];

        // Разбор строки запроса в массив
        parse_str($query, $params);

        // Удаление параметра 'language'
        unset($params['language']);

        // Сборка новой строки запроса без параметра 'language'
        $newQuery = http_build_query($params);

        // Декодирование строки запроса
        $newQuery = urldecode($newQuery);

        // Сборка нового URL
        $url_without_language_query = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'];

        // Добавление строки запроса, если она не пустая
        if (!empty($newQuery)) {
           $url_without_language_query .= '?' . $newQuery;
        }

        $url = $url_without_language_query;

		foreach ($this->rewrite as $rewrite) {
			$url = $rewrite->rewrite($url);
		}

		if (!$js) {
			return str_replace('&', '&amp;', $url);
		} else {
			return $url;
		}
	}
}
