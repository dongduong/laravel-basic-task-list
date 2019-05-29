<?php

namespace Webkul\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Checkout\Repositories\CartItemRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Helpers\ProductImage;
use Webkul\Product\Helpers\View as ProductView;
use Illuminate\Support\Facades\Event;
use Cart;

/**
 * Cart controller for the customer and guest users for adding and
 * removing the products in the cart.
 *
 * @author    Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class CartController extends Controller
{

    /**
     * Protected Variables that holds instances of the repository classes.
     *
     * @param Array $_config
     * @param $cart
     * @param $cartItem
     * @param $customer
     * @param $product
     * @param $productImage
     * @param $productView
     */
    protected $_config;

    protected $cart;

    protected $cartItem;

    protected $customer;

    protected $product;

    protected $productView;

    public function __construct(
        CartRepository $cart,
        CartItemRepository $cartItem,
        CustomerRepository $customer,
        ProductRepository $product,
        ProductImage $productImage,
        ProductView $productView
    )
    {

        $this->middleware('customer')->only(['moveToWishlist']);

        $this->customer = $customer;

        $this->cart = $cart;

        $this->cartItem = $cartItem;

        $this->product = $product;

        $this->productImage = $productImage;

        $this->productView = $productView;

        $this->_config = request('_config');
    }

    /**
     * Method to populate the cart page which will be populated before the checkout process.
     *
     * @return Mixed
     */
    public function index()
    {
        return view($this->_config['view'])->with('cart', Cart::getCart());
    }

    /**
     * Function for guests user to add the product in the cart.
     *
     * @return Mixed
     */
    public function add($id)
    {
        try {
            Event::fire('checkout.cart.add.before', $id);

            $result = Cart::add($id, request()->except('_token'));

            Event::fire('checkout.cart.add.after', $result);

            Cart::collectTotals();

            if ($result) {
                session()->flash('success', trans('shop::app.checkout.cart.item.success'));

                return redirect()->route($this->_config['redirect']);
            } else {
                session()->flash('warning', trans('shop::app.checkout.cart.item.error-add'));

                return redirect()->back();
            }

            return redirect()->route($this->_config['redirect']);

        } catch(\Exception $e) {
            session()->flash('error', trans($e->getMessage()));

            return redirect()->back();
        }
    }

    /**
     * Removes the item from the cart if it exists
     *
     * @param integer $itemId
     */
    public function remove($itemId)
    {
        Event::fire('checkout.cart.delete.before', $itemId);

        Cart::removeItem($itemId);

        Event::fire('checkout.cart.delete.after', $itemId);

        Cart::collectTotals();

        return redirect()->back();
    }

    /**
     * Updates the quantity of the items present in the cart.
     *
     * @return response
     */
    public function updateBeforeCheckout()
    {
        $request = request()->except('_token');

        foreach ($request['qty'] as $id => $quantity) {
            if ($quantity <= 0) {
                session()->flash('warning', trans('shop::app.checkout.cart.quantity.illegal'));

                return redirect()->back();
            }
        }


        foreach ($request['qty'] as $key => $value) {
            $item = $this->cartItem->findOneByField('id', $key);

            $data['quantity'] = $value;

            Event::fire('checkout.cart.update.before', $key);

            Cart::updateItem($item->product_id, $data, $key);

            Event::fire('checkout.cart.update.after', $item);

            unset($item);
            unset($data);
        }

        Cart::collectTotals();

        return redirect()->back();
    }

    /**
     * Add the configurable product
     * to the cart.
     *
     * @return response
     */
    public function addConfigurable($slug)
    {
        session()->flash('warning', trans('shop::app.checkout.cart.add-config-warning'));
        return redirect()->route('shop.products.index', $slug);
    }

    public function buyNow($id)
    {
        Event::fire('checkout.cart.add.before', $id);

        $result = Cart::proceedToBuyNow($id);

        Event::fire('checkout.cart.add.after', $result);

        Cart::collectTotals();

        if (! $result) {
            return redirect()->back();
        } else {
            return redirect()->route('shop.checkout.onepage.index');
        }
    }

    /**
     * Function to move a already added product to wishlist
     * will run only on customer authentication.
     *
     * @param instance cartItem $id
     */
    public function moveToWishlist($id)
    {
        $result = Cart::moveToWishlist($id);

        if (! $result) {
            Cart::collectTotals();

            session()->flash('success', trans('shop::app.wishlist.moved'));

            return redirect()->back();
        } else {
            session()->flash('warning', trans('shop::app.wishlist.move-error'));

            return redirect()->back();
        }
    }
}