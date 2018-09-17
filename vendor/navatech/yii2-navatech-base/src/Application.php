<?php
namespace yii\web;

use navatech\setting\Setting;
use yii\base\Request;
use yii\base\Response;

/**
 * Created by Navatech.
 * @project yii2-advanced
 * @author  Phuong
 * @email   notteen[at]gmail.com
 * @date    05/05/2016
 * @time    1:14 SA
 */
class Application extends \yii\base\Application {

	/**@var Setting return setting components */
	public $setting;

	/**
	 * Handles the specified request.
	 *
	 * This method should return an instance of [[Response]] or its child class
	 * which represents the handling result of the request.
	 *
	 * @param Request $request the request to be handled
	 *
	 * @return Response the resulting response
	 */
	public function handleRequest($request) {
		return parent::handleRequest($request);
	}
}