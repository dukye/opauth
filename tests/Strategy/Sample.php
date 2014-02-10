<?php
/**
 * Sample strategy for Opauth unit testing
 *
 * More information on Opauth: http://opauth.org
 *
 * @copyright    Copyright © 2012 U-Zyn Chua (http://uzyn.com)
 * @link         http://opauth.org
 * @package      Opauth.OpauthTest.SampleStrategy
 * @license      MIT License
 */
namespace Opauth\Opauth\Test\Strategy;

use Opauth\Opauth\AbstractStrategy;

class Sample extends AbstractStrategy {

	/**
	 * Compulsory config keys, listed as unassociative arrays
	 * eg. array('app_id', 'app_secret');
	 */
	public $expects = array('sample_id', 'sample_secret');

	/**
	 * Optional config keys, without predefining any default values.
	 */
	public $optionals = array('scope', 'state', 'access_type', 'approval_prompt');

	/**
	 * Optional config keys with respective default values, listed as associative arrays
	 * eg. array('scope' => 'email');
	 */
	public $defaults = array(
		'scope' => 'test_scope',
		'return' => true
	);

	/**
	 * For testing responses
	 *
	 * @var type
	 */
	public $testRaw = array('some' => 'raw data');

	public $testMap = array();



	/**
	 * An arbitrary function
	 */
	public function request() {
		if (!$this->strategy['return']) {
			return 'wrong';
		}
		return $this->response('raw', array('message' => 'Error from strategy'));
	}

	/**
	 * An arbritary function
	 */
	public function callback() {
		$response = $this->response($this->testRaw);
		$response->setMap($this->testMap);
		return $response;
	}

	public function response($raw, $error = array()) {
		return parent::response($raw, $error);
	}

	/**
	 * overriding to change visbility to public
	 */
	public function sessionData($data = null) {
		return parent::sessionData($data);
	}

	/**
	 * overriding to change visbility to public
	 */
	public function addParams($configKeys, $params = array()) {
		return parent::addParams($configKeys, $params);
	}
}