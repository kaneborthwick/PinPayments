<?php

namespace Towersystems\PinPayments\Request;

use Zend\Http\Response;
use Zend\Stdlib\Parameters;

/**
 *
 */
abstract class PaginatedRequest extends Request {

	protected function handlePaginatedRequest(RequestInterface $request) {

		$httpRequest = $this->buildHttpRequest();
		$parameters = new Parameters(['page' => 1]);
		$httpRequest->setQuery($parameters);

		$response = $this->gateway->execute($httpRequest);
		$pagination = $this->parsePaginationFromResponse($response);
		$totalPages = ceil($pagination['count'] / $pagination['per_page']);

		$items = json_decode($response->getContent(), true)['response'];

		if ($totalPages > 1) {
			$cP = 1;
			while ($cP < $totalPages) {
				$cP++;
				$httpRequest = $this->buildHttpRequest();
				$parameters = new Parameters(['page' => $cP]);
				$httpRequest->setQuery($parameters);
				$response = $this->gateway->execute($httpRequest);
				if (false === $response->isSuccess()) {
					throw new \Exception("Failed to execute request", 1);
				}
				$items = array_merge($items, json_decode($response->getContent(), true)['response']);

			}
		}

		return $items;
	}

	/**
	 * [parsePaginationFromResponse description]
	 *
	 * @param  ResponseInterface $response [description]
	 * @return [type]                      [description]
	 */
	private function parsePaginationFromResponse(Response $response) {

		if (false === $response->isSuccess()) {
			throw new \Exception("Failed to execute request", 1);
		}

		return json_decode($response->getContent(), true)['pagination'];
	}

}