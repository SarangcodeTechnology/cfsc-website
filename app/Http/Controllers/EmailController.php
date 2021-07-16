<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Validators\ReCaptcha;


class EmailController extends Controller
{
    public function sendComplain(Request $request)
    {
        $this->validate($request, [
            'form_message' => 'min:10',
            'g-recaptcha-response' => 'required|recaptcha'
        ], [
            'form_message.min' => 'Your message should have atleast 10 character',
            'g-recaptcha-response.required' => 'Please perform Recaptcha Verification'
        ]);
        $data = [
            // 'form_email' => $request->form_email,
            // 'form_name' => $request->form_name,
            // 'form_address' => $request->form_address,
            'complain' => $request->form_message,
            'g-recaptcha-response' => 'required|recaptcha'
        ];
        Mail::send('email.complain', $data, function ($message) use ($data) {
            $message->from('info@dfokhotang.gov.np', 'Complain');
            $message->to([
                'er.ajeebrimal@gmail.com',
                'er.kshitizshrestha@gmail.com'
            ]);
            $message->subject('Complain From Division Forest Office');
        });

        return redirect()->back()->with('success', 'तपाईको सन्देश सफलताका साथ डिभिजन वन कार्यालयमा पठाईएको छ। तपाईकोे सुझाव,गुनासो तथा उजुरीहरुलाई यस डिभिजन वन कार्यालयले गम्भिर्ताका साथ हेर्नेछ।');
    }
    public function sendContact(Request $request)
    {
        $this->validate($request, [
            'form_message' => 'min:10',
            'g-recaptcha-response' => 'required|recaptcha'
        ], [
            'form_message.min' => 'Your message should have atleast 10 character',
            'g-recaptcha-response.required' => 'Please perform Recaptcha Verification'
        ]);
        $data = [
            'form_email' => $request->form_email,
            'form_name' => $request->form_name,
            'form_phone' => $request->form_phone,
            'form_address' => $request->form_address,
            'form_message' => $request->form_message,
            'g-recaptcha-response' => 'required|recaptcha'
        ];
        Mail::send('email.contact', $data, function ($message) use ($data) {
            $message->from($data['form_email'], 'Message');
            $message->to([
                'er.ajeebrimal@gmail.com',
                'er.kshitizshrestha@gmail.com'
            ]);
            $message->subject('Contact Form - Division Forest Office');
        });

        return redirect()->back()->with('success', 'तपाईको सन्देश सफलताका साथ डिभिजन वन कार्यालयमा पठाईएको छ। तपाईकोे सन्देश विश्लेषण पश्चात सम्बोधन गरिनेछ।');
    }
}
