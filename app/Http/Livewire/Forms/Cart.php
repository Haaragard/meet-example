<?php

namespace App\Http\Livewire\Forms;

use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Component;

class Cart extends Component
{
    public Collection $products;
    public Collection $items;

    public function mount()
    {
        $this->products = Product::all();
        $this->items = collect([$this->newProduct()]);
    }

    public function render()
    {
        return view('livewire.forms.cart');
    }

    public function addItem()
    {
        $this->items->add($this->newProduct());
    }

    public function changeValue(int $index)
    {
        $item = $this->items[$index];
        $product = $this->products[$item['product_id']] ?? new Product();

        $newItem = $this->newProduct([
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'value' => round($product->value * $item['quantity'], 2),
        ]);

        $this->items->put($index, $newItem);
    }

    public function removeItem(int $index)
    {
        if ($this->items->count() > 1) {
            $this->items->forget($index);
        }
    }

    public function resetCart()
    {
        $this->items = collect([$this->newProduct()]);
    }

    private function newProduct(?array $item = null): Collection
    {
        return collect($item ?? [
            'product_id' => null,
            'quantity' => 0,
            'value' => 0,
        ]);
    }
}
