<?php

namespace App\Livewire\Kladr;

use Livewire\Component;

class SelectAddress extends Component
{
    public string $name;

    public string $region;
    public string $city;
    public string $street;
    public string $house;

    public function mount($name, $region = null, $city = null, $street = null, $house = null)
    {
        $this->name = $name;

        $this->region = strval(old("{$name}.region", empty($region) ? '' : $region));
        $this->city = strval(old("{$name}.city", empty($city) ? '' : $city));
        $this->street = strval(old("{$name}.street", empty($street) ? '' : $street));
        $this->house = strval(old("{$name}.house", empty($house) ? '' : $house));


    }

    public function render()
    {
        return view('livewire.kladr.select-address');
    }

    public function setRegion($code)
    {
        if($this->region == $code) return;
        $this->region = $code;
        $this->city = '';
        $this->street = '';

        $this->emitSelf('reInitCity');
        $this->emitSelf('reInitStreet');
    }

    public function setCity($code)
    {
        if($this->city == $code) return;
        $this->city = $code;
        $this->street = '';
        $this->emitSelf('reInitStreet');
    }

    public function setStreet($code)
    {
        if($this->street == $code) return;
        $this->street = $code;
    }
}
