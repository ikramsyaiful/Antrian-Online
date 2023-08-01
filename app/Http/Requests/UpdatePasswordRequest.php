<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Hash;
class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
				return [
						'password' => ['required', 'string', 'min:8', 'confirmed'],
						'current_password' => [
								'required',
								function ($attribute, $value, $fail) {
										if (!Hash::check($value, auth()->user()->password)) {
												$fail('Password yang lama tidak sama');
										}
								},
						],
				];
    }
		
    public function messages(){
        return [
            'password.required' => 'Silahkan isi password baru',
            'password.min' => 'Password minimal 8',
            'password.confirmed' => 'Password tidak sama',
        ];
    }
}
