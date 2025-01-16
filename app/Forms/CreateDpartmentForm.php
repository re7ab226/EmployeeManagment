<?php

namespace App\Forms;

use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\SpladeForm;

class CreateDpartmentForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        $form
            ->action(route('admin.department.store'))
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
                ->label('name'),

            Submit::make()
                ->label(__('Save')),
        ];
    }
}