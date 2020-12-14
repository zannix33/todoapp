<?php
namespace App\Libraries\Repositories;

use App\Libraries\Interfaces\TodoStatusInterface;
use Carbon\Carbon;

class TodoStatusRepository implements TodoStatusInterface {
	protected $todoData;
	protected $incomplete;
	protected $complete;
	protected $label;
	protected $fromDate;

	public function __construct($todoData, $fromDate)
	{
		$this->todoData = $todoData;
		$this->fromDate = $fromDate;
	}

	public function status()
	{
		$ctr = 0;
		$incompleteCount = 0;
		$completeCount = 0;

		while($ctr < 60){
			$incompleteCount += $this->todoData->whereBetween('created_at', [Carbon::parse($this->fromDate)->addMinutes($ctr)->startOfMinute(), Carbon::parse($this->fromDate)->addMinutes($ctr)->endOfMinute()])->count();
			$completeCount += $this->todoData->whereNotNull('completed_at')->whereBetween('completed_at', [Carbon::parse($this->fromDate)->addMinutes($ctr)->startOfMinute(), Carbon::parse($this->fromDate)->addMinutes($ctr)->endOfMinute()])->count();

			$this->incomplete[] = $incompleteCount - $completeCount;
			$this->complete[] = $completeCount;

			++$ctr;
		}

		return ['incomplete' => $this->incomplete, 'complete' => $this->complete];
	}

	public function labels()
	{
		$ctr = 0;

		while($ctr < 60){
			$this->label[] = Carbon::parse($this->fromDate)->addMinutes($ctr)->format('h:i');
			++$ctr;
		}

		return $this->label;

	}
}
