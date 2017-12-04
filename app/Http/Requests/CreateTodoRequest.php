<?php

namespace App\Http\Requests;

//use App\Http\Requests\FormRequest;


use Illuminate\Foundation\Http\FormRequest;
use function redirect;

class CreateTodoRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'title' => 'required',
            'description' => 'required|max:50',
            'reference' => 'required',
            'priority' => 'required',
            'category' => 'required'
        ];
    }
    
    public function response(array $errors)
    {
        return redirect()->back()->withInput()->withErrors($errors);
    }
}
