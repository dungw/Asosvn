<?php namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class CmsController extends Controller {

	public function contact()
	{
		return view('cms.contact');
	}

	public function create(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'name' => 'required',
			'content' => 'required',
		]);

		$contact = Contact::create($request->all());
		if ($contact) {
			return view('cms.contact.success');
		}

		return redirect(URL::previous())
			->withInput()
			->withErrors([
				'message' => 'Can not send your comment!',
			]);
	}

}
