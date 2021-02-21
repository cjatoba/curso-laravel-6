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

        //Obtem o valor do id do produto em edição pelo segmento da url
        //Neste caso da url products/102/edit o segmento 1 é products e o segmento 2 é o valor 102
        $id = $this->segment(2);

        return [
            //Realizando as validações
            
            //required=Campo obrigatório
            //max: quantidade máxima de caracteres
            //No parâmetro unique:products,name,{$id},id é adionada uma excessão para permitir inserir um novo 
            //produto somente quando o id do produto for igual ao id em edição
            'name' => "required|min:3:max:255|unique:products,name,{$id},id",
            //min: quantidade mínima de caracteres
            'description' => 'required|min:3|max:10000',
            //regex valida o campo por uma expressão regular
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            //nullable: campo não obrigátorio
            //image: verifica se o arquivo é uma imagem
            'image' => 'nullable|image'

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
            'price.required' => 'O campo preço é obrigatório',
            'description.required' => 'O campo descrição é obrigatório',
            'image.required' => 'É obrigatório o upload de uma foto'
        ];
    }
}
