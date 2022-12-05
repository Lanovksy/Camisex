<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
     * @return array<string, mixed>
     */

    //  Mensagens caso chegue algum campo em branco
    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório',
            'quality.required' => 'O campo Qualidade é obrigatório',
        ];
    }

    // Regras para definir o que é requerido em cada função nas controllers
    public function rules()
    {
        switch (strtolower($this->route()->getActionMethod())):
            case 'create_brand':
                return [
                    'name' => 'required|string',
                    'quality' => 'required|string',
                ];
                break;
            case 'update_brand':
                return [
                    'name' => 'required|string',
                    'quality' => 'required|string',
                ];
                break;
            default:
                return [];
                break;
        endswitch;
    }
}
