<?php
use App\Models\User_model;

if(!function_exists('getUserAccessArrayHELPER')) {
	function getUserAccessArrayHELPER() {
		$userModel = new User_model();
		if (session()->has('userId')) {
			$userAccessArray = $userModel->getUserAccess(session()->get('userId'));
		}
		else if (isset($_COOKIE['userId'])) {
			$userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);
		}
		return $userAccessArray;
	}
}
?>