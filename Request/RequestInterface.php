<?php

namespace Towersystems\PinPayments\Request;

use Zend\Http\Request as HttpRequest;

/**
 *
 */
interface RequestInterface {

	/**
	 * [execute description]
	 *
	 * @return [type] [description]
	 */
	public function execute(array $config = []);

	/**
	 * [buildHttpRequest description]
	 *
	 * @return [type] [description]
	 */
	public function buildHttpRequest(): HttpRequest;

	/**
	 * @return mixed
	 */
	public function getMethod();

	/**
	 * @param mixed $method
	 *
	 * @return self
	 */
	public function setMethod($method);

	/**
	 * @return mixed
	 */
	public function getApiEndpoint();

	/**
	 * @param mixed $endpoint
	 *
	 * @return self
	 */
	public function setApiEndpoint($endpoint);

	/**
	 * @return mixed
	 */
	public function getContent();

	/**
	 * @param mixed $content
	 *
	 * @return self
	 */
	public function setContent($content);

	/**
	 * @return mixed
	 */
	public function getHeaders();

	/**
	 * @param mixed $headers
	 *
	 * @return self
	 */
	public function setHeaders($headers);

}