<?php


declare(strict_types=1);

namespace App\Http\Livewire\Traits;

trait AddressPropertiesMessagesTrait{
    protected $messages = [//validações com menssagens
        'data.email.required' => 'email obrigatorio',
        'data.zipcode.required' => 'o Campo CEP É obrigatório',
        'data.street.required' => 'o Campo ENdereço É obrigatório',
        'data.neighborhood.required' => 'o Campo BAIRRO É obrigatório',
        'data.city.required' => 'o Campo CIDADE É obrigatório',
        'data.state.required' => 'o Campo Estado  É obrigatório',
        'data.state.max'       => 'PREENCHA COORRETAMENTE'
    ];
}