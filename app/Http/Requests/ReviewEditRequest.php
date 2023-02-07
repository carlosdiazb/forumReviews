<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewEditRequest extends ReviewCreateRequest
{
    function attributes(){
        $rules = parent::rules();
        return $rules;
    }
}
