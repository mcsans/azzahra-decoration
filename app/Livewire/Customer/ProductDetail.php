<?php

namespace App\Livewire\Customer;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProductDetail extends Component
{
    public $productID;
    public $product;

    public $productAlreadyInCart = false;

    public $quantity = 1;

    public function mount($product)
    {
        // Middleware
        $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product)->first();
        if ($cart) {
            $this->productAlreadyInCart = true;
        }
        // End Middleware

        $this->productID = $product;

        $this->product = Product::find($product);
    }

    public function render()
    {
        return view('livewire.customer.product-detail');
    }

    public function quantityPlus()
    {
        $this->skipRender();

        if ($this->quantity < $this->product->stock) {
            $this->quantity = $this->quantity + 1;
        }
    }

    public function quantityMinus()
    {
        $this->skipRender();

        if ($this->quantity > 1) {
            $this->quantity = $this->quantity - 1;
        }
    }

    public function save()
    {
        if ($this->quantity <= $this->product->stock) {

            try {
                DB::transaction(function () {

                    Cart::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $this->product->id,
                        'quantity' => $this->quantity,
                    ]);
                });

                $this->dispatch('sweetalert', icon: 'success', title: 'Berhasil Ditambahkan ke Keranjang');
                return redirect()->route('customer.cart');
            } catch (\Exception $e) {

                Log::error('Failed add to cart: ' . $e->getMessage());
                $this->dispatch('sweetalert', icon: 'error', title: 'Terjadi Kesalahan.', text: 'Silakan hubungi pengembang.');
            }
        } else {
            $this->dispatch('sweetalert', icon: 'info', title: 'Stok Maksimum Terpenuhi.');
        }
    }
}
