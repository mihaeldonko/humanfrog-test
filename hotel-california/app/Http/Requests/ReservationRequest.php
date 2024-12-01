<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'arrival_date' => 'required|date|after_or_equal:today',
            'departure_date' => 'required|date|after:arrival_date',
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'arrival_date.required' => 'Prosimo, izberite datum prihoda.',
            'arrival_date.date' => 'Datum prihoda mora biti veljaven datum.',
            'arrival_date.after_or_equal' => 'Datum prihoda ne more biti v preteklosti.',
            'departure_date.required' => 'Prosimo, izberite datum odhoda.',
            'departure_date.date' => 'Datum odhoda mora biti veljaven datum.',
            'departure_date.after' => 'Datum odhoda mora biti po datumu prihoda.',
            'room_id.required' => 'Prosimo, izberite sobo.',
            'room_id.exists' => 'Izbrana soba ne obstaja.',
            'name.required' => 'Prosimo, vnesite vaše ime in priimek.',
            'email.required' => 'Prosimo, vnesite vaš email.',
            'email.email' => 'Email mora biti veljaven.',
            'phone.required' => 'Prosimo, vnesite vašo telefonsko številko.',
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha verification failed. Please try again.',
        ];
    }
}
