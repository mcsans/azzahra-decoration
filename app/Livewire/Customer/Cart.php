<?php

namespace App\Livewire\Customer;

use App\Models\Cart as ModelsCart;
use Livewire\Component;

class Cart extends Component
{
    public $cartProducts;
    public $cartQuantities = [];

    public function mount()
    {
        $this->cartProducts = ModelsCart::with('product')->where('user_id', auth()->user()->id)->get();

        foreach ($this->cartProducts as $cartProduct) {
            $this->cartQuantities[$cartProduct->id] = $cartProduct->quantity;
        }
    }

    public function render()
    {
        return view('livewire.customer.cart');
    }

    public function quantityPlus($id)
    {

        $cartProduct = $this->cartProducts->find($id);
        $currentStock = $cartProduct->product->stock ?? 0;

        if ($this->cartQuantities[$id] < $currentStock) {
            $this->cartQuantities[$id] = $this->cartQuantities[$id] + 1;

            $cartProduct->quantity = $this->cartQuantities[$id];
            $cartProduct->save();
        } else {
            $this->dispatch('sweetalert', icon: 'info', title: 'Maximum stock reached.');
            $this->mount();
        }
    }

    public function quantityMinus($id)
    {
        $cartProduct = $this->cartProducts->find($id);

        if ($this->cartQuantities[$id] > 1) {
            $this->cartQuantities[$id] = $this->cartQuantities[$id] - 1;

            $cartProduct->quantity = $this->cartQuantities[$id];
            $cartProduct->save();
        }
    }

    public function quantityUpdate($id)
    {
        $cartProduct = $this->cartProducts->find($id);
        $currentStock = $cartProduct->product->stock ?? 0;

        if ($this->cartQuantities[$id] > 1 && $this->cartQuantities[$id] < $currentStock) {
            $cartProduct->quantity = $this->cartQuantities[$id];
            $cartProduct->save();
        } else {
            $this->dispatch('sweetalert', icon: 'info', title: 'Maximum stock reached.');
            $this->mount();
        }
    }

    public function deleteCart($id)
    {
        $cartProduct = $this->cartProducts->find($id);
        $cartProduct->delete();

        $this->mount();
    }
}
