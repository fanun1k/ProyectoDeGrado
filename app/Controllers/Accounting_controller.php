<?php

namespace App\Controllers;

use App\Models\Accounting_model;
use App\Models\User_model;
use CodeIgniter\RESTful\ResourceController;

class Accounting_controller extends ResourceController
{
    protected $modelName = 'App\Models\Accounting_model';
    protected $format    = 'json';

	public function index()
	{
		$userModel = new User_model();
		if (session()->has('userId')) $userAccessArray = $userModel->getUserAccess(session()->get('userId'));
		else if (isset($_COOKIE['userId'])) $userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);

		$diningArea = 1;
		$fund = $this->model->getDiningAreaFund($diningArea);

		$view = view('header_footer/header') . view('header_footer/sidebar', compact('userAccessArray')) . view('Accounting_view', compact('fund'));
		return $view;
	}

	public function withdrawPettyCash()
	{
		$userModel = new User_model();
		if (session()->has('userId')) $userAccessArray = $userModel->getUserAccess(session()->get('userId'));
		else if (isset($_COOKIE['userId'])) $userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);
		else return redirect()->route('inicio');
		
		$userId = (session()->has('userId')) ? session()->get('userId') : $_COOKIE['userId'];
		$diningAreaId = 1;
		$fund = $this->model->getDiningAreaFund($diningAreaId);
		$withdrawAmount = $this->request->getPost('quantity');
		$newAmount = $fund - $withdrawAmount;

		if($newAmount < 0) {
			//Error Message
		}
		else {
			$this->model->withdrawPettyCash($diningAreaId, $newAmount, $withdrawAmount, $userId, 0);
		}
		return redirect()->route('contabilidad/caja_chica');
	}

	public function depositPettyCash()
	{
		$userModel = new User_model();
		if (session()->has('userId')) $userAccessArray = $userModel->getUserAccess(session()->get('userId'));
		else if (isset($_COOKIE['userId'])) $userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);
		else return redirect()->route('inicio');
		
		$userId = (session()->has('userId')) ? session()->get('userId') : $_COOKIE['userId'];
		$diningAreaId = 1;
		$fund = $this->model->getDiningAreaFund($diningAreaId);
		$withdrawAmount = $this->request->getPost('quantity');
		$newAmount = $fund + $withdrawAmount;

		if($newAmount > 9999) {
			//Error Message
		}
		else {
			$this->model->withdrawPettyCash($diningAreaId, $newAmount, $withdrawAmount, $userId, 1);
		}
		return redirect()->route('contabilidad/caja_chica');
	}
}

?>