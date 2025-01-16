<?php

namespace App\Forms;

use App\Models\State;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;

class UpdateCityForm extends AbstractForm
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
            ->rules(['required'])
                ->label('Name'),
                Select::make('state_id')
                ->label('Choose a state')
                ->rules(['required'])
                ->options(State::pluck('name','id')->toArray()),
            Submit::make()
                ->label(__('Save')),
        ];
    }
}