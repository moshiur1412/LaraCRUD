<?php 

namespace App\Breadcrumbs;

use Illuminate\Http\Request; 
use App\Breadcrumbs\Segment;

class Breadcrumbs
{

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function segments()
	{
		$dataFilter =  collect($this->request->segments())->map(function($segment){
			if($segment != 'list'){
				return new Segment($this->request, $segment);
			} 

		})->forget('null')->toArray();

		return array_filter($dataFilter);


	}
}