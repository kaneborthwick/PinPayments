<?php
namespace Towersystems\PinPayments\Exception;

/**
 *
 */
class InvalidRequestException extends \Exception {

	/** @var [type] [description] */
	protected $error;

	/** @var array [description] */
	protected $messages = [];

	/**
	 * [__construct description]
	 * @param [type] $description [description]
	 * @param array  $messages    [description]
	 * @param string $error       [description]
	 */
	function __construct($description, $messages = [], $error = "") {
		$this->error = $error;
		$this->messages = $messages;
		parent::__construct($description);
	}

	/**
	 * @return mixed
	 */
	public function getError() {
		return $this->error;
	}

	/**
	 * @return mixed
	 */
	public function getMessages() {
		return $this->messages;
	}
}