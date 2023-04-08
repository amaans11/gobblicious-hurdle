<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->facebook_id,
            $user->data?->get('hurdle_process'),
            $user->data?->get('source_id'),
            implode('|', $user->data?->get('shopFor') ?? []),
            $user->data?->get('groceryFrequency'),
            implode('|', $user->data?->get('shoppingList') ?? []),
            implode('|', $user->data?->get('diets') ?? []),
            implode('|', $user->data?->get('cause') ?? []),
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Facebook id',
            'Hurdle process',
            'Source id',
            'Shop For',
            'Grocery Frequency',
            'Shopping List',
            'Diets',
            'Causes',
        ];
    }
}
