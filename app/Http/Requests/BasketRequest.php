<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasketRequest extends FormRequest
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
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'count' => 'required|integer',
        ];
    }

    public function validationData()
    {
        $this->request->add(['user_id' => auth()->user()->id]);

        return $this->request->all();
    }
}
