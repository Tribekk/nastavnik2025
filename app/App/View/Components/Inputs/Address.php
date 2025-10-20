<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Address extends Component
{
    public string $name;

    public string $title;

    public bool $required;

    public string $id;

    public string $placeholder;

    public ?string $region;
    public ?string $city;
    public ?string $street;
    public ?string $house;

    public function __construct
    (
        string $name,
        string $title,
        string $placeholder = 'Выбрать',
        bool $required = false,
        string $id = '',
        ?string $region = null,
        ?string $city = null,
        ?string $street = null,
        ?string $house = null
    )
    {
        $this->name = $name;
        $this->title = $title;
        $this->required = $required;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->region = $region;
        $this->city = $city;
        $this->street = $street;
        $this->house = $house;
    }

    public function render()
    {
        return view('components.inputs.address');
    }
}
