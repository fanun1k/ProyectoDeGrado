<?php

namespace App\Models;

use CodeIgniter\Model;

class Accounting_model extends Model
{
    protected $table = 'petty_cash';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'pettyCashId';
    protected $allowedFields = ['pettyCashId', 'diningAreaId', 'fund', 'lastUpdate', 'status'];

	public function getDiningAreaFund($diningAreaId)
	{
		$db = db_connect();
		$builder = $db->table('petty_cash')->select('fund')->where('diningAreaId', $diningAreaId);

		$query = $builder->get();

		foreach ($query->getResult() as $row) {
			return $row->fund;             
		}
		return -1;
	}

	public function withdrawPettyCash($diningAreaId, $newAmount, $withdrawAmount, $userId, $type)
	{
		$db = db_connect();
		$builder = $db->table('petty_cash');
		$builder->where('diningAreaId', $diningAreaId);
		$builder->update(['fund' => $newAmount]);

		$builder1 = $db->table('petty_cash')->select('pettyCashId')->where('diningAreaId', $diningAreaId);
		$query = $builder1->get();
		foreach ($query->getResult() as $row) {
			$pettyCashId = $row->pettyCashId;
		}

		$pettyCashRecordArray = array(
			'userId'		=> $userId,
			'pettyCashId'	=> $pettyCashId,
			'amount'		=> $withdrawAmount,
			'type'			=> $type //0 = withdraw, 1 = deposit
		);
		$builder2 = $db->table('petty_cash_record')->insert($pettyCashRecordArray);
	}
}