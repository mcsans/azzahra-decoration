<?php

namespace App\View\Components\customer;

use App\Models\Cart;
use App\Models\CategoryProduct;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $countCarts;
    public $categoryProducts;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $user = auth()->user()->id ?? 0;

        $this->countCarts = Cart::where('user_id', $user)->count();
        $this->categoryProducts = CategoryProduct::orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customer.header');
    }
}
