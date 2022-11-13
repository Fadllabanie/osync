<?php

namespace App\Exports;

use App\Card;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CardsExport implements FromCollection, WithMapping,  WithHeadings
{
    protected $cards;

    function __construct($cards) {
        $this->cards = $cards;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->cards;
    }
    public function map($card): array
    {
        return [
            $card->id,
            $card->token,
            $card->category->name,
            $card->subcategory->name,
            $card->origin->name,
            $card->admin?$card->admin->name:''
        ];
    }

    public function headings(): array
    {
        return [
            'Serial',
            'Qr Code',
            'Category',
            'Subcategory',
            'Origin',
            'Corporate'
            
        ];
    }
}
