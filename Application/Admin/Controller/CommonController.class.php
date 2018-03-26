<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!session('?userinfo')) {
			$this -> redirect("Admin/index/index");
		}
	}
}