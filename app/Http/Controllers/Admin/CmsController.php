<?php namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CmsController extends AdminController {

	public function contact()
	{
		$data['contacts'] = Contact::all();

		return view('admin.pages.cms.contact', $data);
	}

	public function faq()
	{
		return view('admin.pages.cms.faq');
	}

	public function terms()
	{
		return view('admin.pages.cms.terms');	
	}

	public function policy()
	{
		return view('admin.pages.cms.policy');			
	}

	public function refund()
	{
		return view('admin.pages.cms.refund');	
	}
}
