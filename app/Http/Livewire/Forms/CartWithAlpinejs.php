<?php

namespace App\Http\Livewire\Forms;

use App\Models\Product;
use Livewire\Component;

class CartWithAlpinejs extends Component
{
    public array $products;
    public array $items;

    public function mount()
    {
        $this->products = Product::all()->toArray();
        $this->items = [];
    }

    public function render()
    {
        return view('livewire.forms.cart-with-alpinejs');
    }
}
