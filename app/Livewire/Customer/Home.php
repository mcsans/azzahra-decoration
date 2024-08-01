<?php

namespace App\Livewire\Customer;

use App\Models\Cart;
use App\Models\CategoryProduct;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public $topCategoryProducts;
    public $categoryProducts;
    public $products;

    public function mount()
    {
        $this->topCategoryProducts = CategoryProduct::limit(4)->get();
        $this->categoryProducts = CategoryProduct::with('products')->orderBy('name')->get();
        $this->products = Product::get();
    }

    public function render()
    {
        return view('livewire.customer.home');
    }
}
