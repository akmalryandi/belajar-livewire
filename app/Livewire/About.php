<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class About extends Component
{
    #[Title('About')]
    public function render()
    {
        return <<<'HTML'
        <div class="text-center mt-30">
            <h1 class="text-3xl font-semibold">About Page</h1>
        </div>

        HTML;
    }
}
