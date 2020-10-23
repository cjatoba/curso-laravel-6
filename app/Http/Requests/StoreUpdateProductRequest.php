<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Verifica se usuário tem permissão
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
            //Realizando as validações
            
            //required=Campo obrigatório
            //min: quantidade mínima de caracteres
            //max: quantidade máxima de caracteres
            //nullable: campo não obrigátorio
            //image: verifica se o arquivo é uma imagem
            'name' => 'required|min:3:max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image'

            //Uma outra forma de representação é em formato se array
            //como no exemplo abaixo:
            //'name' => [
            //  'required', 'image'
            //]
        ];
    }

    //Função para personalizar as mensagens de validação
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome deve conter no mínimo 3 caracteres',
            'photo.required' => 'É obrigatório o upload de uma foto'
        ];
    }
}
