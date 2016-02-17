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

}
