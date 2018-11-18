<?php

namespace Towersystems\PinPayments\Gateway;

use Zend\Http\Request;
use Zend\Http\Response;

interface PinPaymentsGatewayInterface {

	/**
	 * [getApiEndpoint description]
	 *
	 * @param  [type] $endpoint [description]
	 * @return [type]           [description]
	 */
	public function getApiEndpoint($endpoint): string;

	/**
	 * [execute description]
	 *
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function execute(Request $request): Response;

	/**
	 * [getOption description]
	 *
	 * @param  string $key [description]
	 * @return [type]      [description]
	 */
	public function getOption(string $key);
}