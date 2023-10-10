<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactForm\ContactFormStoreRequest;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    public function store(ContactFormStoreRequest $request)
    {
        $data = $request->validated();

        $contactForm = ContactForm::query()->create($data);

        return response()->json($contactForm);
    }
}
