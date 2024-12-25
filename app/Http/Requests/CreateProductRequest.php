<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Collection;

class CreateProductRequest extends FormRequest
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
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'weight' => 'required|integer',
            'image' => 'required|string',
            'old_price' => 'nullable|integer',
        ];
    }

    public function validationData()
    {
        $file = request()->file('image');
        $content = file_get_contents($file->path());
        $name = "products/".$file->getClientOriginalName();
        Storage::disk('public')->put($name, $content);

        $this->request->add(["image" => $name]);

        return $this->request->all();
    }
}
