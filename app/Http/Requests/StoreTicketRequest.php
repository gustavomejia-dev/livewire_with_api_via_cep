<?php

namespace App\Http\Requests;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'status' => 'required|',
            'assunto' => 'required',
            'texto' => 'required|max:255',
            'email' => 'required|email|max:255',
            'nome_remetente' => 'required',
            
            
        ];
        
    }

    public function messages(){
        return [
        'email.email' => 'Digite um email correto',
        'required' => 'Campo Obrigatório',
        'max' => 'Limite de Caracteres Atingido',
        'status.required' => 'Selecione Alguma das Opções',
        'texto.required' => 'Descreva O Problema Por Favor'
        ];
    }
}
