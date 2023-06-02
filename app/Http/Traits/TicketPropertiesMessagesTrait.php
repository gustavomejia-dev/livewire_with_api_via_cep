<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;


trait TicketPropertiesMessagesTrait{
    
    
    
    public static function messages ($data){
            
            return
                [
                 'data.email.required' => 'Email obrigatorio',
                ];
            
            

            
    }
        
}


