<?php 

namespace App\Breadcrumbs;

use Illuminate\Http\Request; 
use Illuminate\Support\Str;


class Segment 
{
	protected $request;
	protected $segment;

	public function __construct(Request $request, $segment)
	{
		$this->request = $request;
		$this->segment = $segment;
	}

	public function name()
	{

		$bredcrumbName = [];

		// return  collect(request()->segments());

		return collect($bredcrumbName)->first() ?: Str::title($this->segment);
	}

	public function isNumber()
	{
		return collect($this->request->route()->parameters())->first();
	}

	public function baseName()
	{
		return Str::title($this->segment);
	}
	public function url()
	{
		// return url(implode(array_slice($this->request->segments(), 0, $this->position() +1), '/'));
		return url(implode('/', array_slice($this->request->segments(), 0, $this->position() + 1)));

	}

	public function position()
	{
		return array_search($this->segment, $this->request->segments());
	}
}