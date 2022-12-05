<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CondomRequest extends FormRequest
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
            'price.required' => 'O campo Preço é obrigatório',
            'quantity.required' => 'O campo Quantidade é obrigatório',
            'brand_id.required' => 'O campo Marca é obrigatório',
            'description.required' => 'O campo Descrição é obrigatório',
        ];
    }

    // Regras para definir o que é requerido em cada função nas controllers
    public function rules()
    {
        switch (strtolower($this->route()->getActionMethod())):
            case 'create_condom':
                return [
                    'name' => 'required|string',
                    'price' => 'required|integer',
                    'quantity' => 'required|integer',
                    'brand_id' => 'required|integer',
                    'description' => 'required|string',
                ];
                break;
            case 'update_condom':
                return [
                    'name' => 'required|string',
                    'price' => 'required|integer',
                    'quantity' => 'required|integer',
                    'brand_id' => 'required|integer',
                    'description' => 'required|string',
                ];
                break;
            default:
                return [];
                break;
        endswitch;
    }
}
