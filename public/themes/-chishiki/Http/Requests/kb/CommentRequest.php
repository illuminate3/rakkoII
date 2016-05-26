<?php

namespace App\Modules\Chishiki\Http\Requests\kb;

use App\Modules\Chishiki\Http\Requests\Request;


class CommentRequest extends Request
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
            'name'    => 'required|max:50',
            'email'   => 'required|email',
            'website' => 'url',
            'comment' => 'required|max:500',
        ];
	}


}
