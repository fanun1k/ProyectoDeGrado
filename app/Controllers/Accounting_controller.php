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

		$diningAreaId = 1;
		$fund = $this->model->getDiningAreaFund($diningAreaId);
		$pettyCashRecord = $this->model->getPettyCashRecordList($diningAreaId);

		$view = view('header_footer/header') . view('header_footer/sidebar', compact('userAccessArray')) . view('Accounting_view', compact('fund', 'pettyCashRecord'));
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
		$motive = $this->request->getPost('motive');

		if($newAmount < 0) {
			//Error Message
		}
		else {
			$this->model->depositAndWithdrawPettyCash($diningAreaId, $newAmount, $withdrawAmount, $motive, $userId, 0);
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
		$motive = $this->request->getPost('motive');

		if($newAmount > 9999) {
			//Error Message
		}
		else {
			$this->model->depositAndWithdrawPettyCash($diningAreaId, $newAmount, $withdrawAmount, $motive, $userId, 1);
		}
		return redirect()->route('contabilidad/caja_chica');
	}

	public function fixedCost()
	{
		$userModel = new User_model();
		if (session()->has('userId')) $userAccessArray = $userModel->getUserAccess(session()->get('userId'));
		else if (isset($_COOKIE['userId'])) $userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);
		else return redirect()->route('inicio');

		$view = view('header_footer/header') . view('header_footer/sidebar', compact('userAccessArray')) . view('Accounting_fixed_cost_view');
		return $view;
	}

	public function variableCost()
	{
		$userModel = new User_model();
		if (session()->has('userId')) $userAccessArray = $userModel->getUserAccess(session()->get('userId'));
		else if (isset($_COOKIE['userId'])) $userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);
		else return redirect()->route('inicio');

		$view = view('header_footer/header') . view('header_footer/sidebar', compact('userAccessArray')) . view('Accounting_variable_cost_view');
		return $view;
	}
}

?>