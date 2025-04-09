<?php

namespace App\Livewire;

use App\Models\profissional;
use Livewire\Component;

class ProfissionalIndex extends Component
{
    public $profissionais;

    public function mount()
    {
        $this->loadProfissionais();
    }
    public function loadProfissionais()
    {
        $this->profissionais = profissional::latest()->get();
    }

    public function render()
    {
        return view('livewire.profissional-index')->layout('layouts.app');
    }
}
