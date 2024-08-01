<?php

namespace App\Livewire\Customer;

use App\Models\CategoryProduct;
use App\Models\Product;
use Livewire\Component;

class Shop extends Component
{
    public $categoryProducts;
    public $categoryProductID;
    public $products;
    public $countAllProducts;

    public $keyword;
    public $highest_price = false;
    public $lowest_price = false;

    protected $listeners = [
        'reloadProducts',
        'updateCategoryProductID',
    ];

    public function mount($categoryProduct = null)
    {
        $this->categoryProductID = $categoryProduct;

        $this->categoryProducts = CategoryProduct::with('products')->orderBy('name')->get();
        $this->countAllProducts = Product::count();
        $this->products();
    }

    public function render()
    {
        return view('livewire.customer.shop');
    }

    public function products()
    {
        $queryProducts = Product::with('categoryProduct');

        if ($this->keyword) {
            $keyword = str_replace(' ', '%', $this->keyword);
            $queryProducts->where('name', 'LIKE', '%' . $keyword . '%');
        }

        if ($this->categoryProductID) {
            $queryProducts->where('category_product_id', $this->categoryProductID);
        }

        $this->products = $queryProducts->get();
    }

    public function reloadProducts()
    {
        $this->products();
    }

    public function updateCategoryProductID($id)
    {
        $this->categoryProductID = $id;
        $this->products();
    }
}
