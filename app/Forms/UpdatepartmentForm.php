<?php

namespace App\Forms;

use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\SpladeForm;

class UpdatepartmentForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
         
            ->method('PUT')
            ->class('space-y-4');
           
    }

    public function fields(): array
    {
        return [
            Text::make('name')
                ->label('name'),

    

            Submit::make()
                ->label(__('Save')),
        ];
    }
}