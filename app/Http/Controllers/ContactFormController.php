<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
class ContactFormController extends Controller
{
    public function store(Request $request): RedirectResponse {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex: /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/'],
            'question'=> ['required', 'string', 'max:255'],
         ]);

        $form = ContactForm::create($request->all());

        $form->save();

        
        return Redirect::to(URL::previous() . "#contact-form")->with('status', 'save-form');
    }
}
