<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class CreateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            //'email' => 'required,email',
            //'email' => 'exists:staff,email,account_id,1'
            'email' => 'unique:bini_users,email',
            'login_name' => 'unique:bini_users',
            'bio' => 'required',
            'picture_url' => 'required',
            'facebook_id' => 'required',
            'twitter_id' => 'required',
            'social_network_flag' => 'required',
            'password' => 'required'
        ];
    }
    public function response(array $errors){
        return response()->json(['message'=>$errors,'code' =>422], 422);

    }
}
