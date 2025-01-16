<?php

namespace App\Forms;

use App\Models\Country;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;

class CreateStateForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('admin.state.store'))
            ->method('POST')
            ->class('space-y-4')
            ->fill([
              //
            ]);
    }

    public function fields(): array
    {
        return [
            Text::make('name')
                ->label('Name')->rules(['required', 'max:255']),

                Select::make('country_id')
                ->label('Choose a country')
                ->rules(['required'])
                ->options(Country::pluck('name','id')->toArray()),

            Submit::make()
                ->label(__('Save')),
        ];
    }
}