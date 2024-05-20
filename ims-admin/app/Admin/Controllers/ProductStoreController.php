<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\ProductStore;
use App\Models\Store;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductStoreController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ProductStore';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ProductStore());

        $grid->column('id', __('Id'));
        $grid->column('product_id', __('Product id'));
        $grid->column('store_id', __('Store id'));
        $grid->column('in_stock', __('In stock'));
        $grid->column('sale_stock', __('Sale stock'));
        $grid->column('warehouse_stock', __('Warehouse stock'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ProductStore::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product_id', __('Product id'));
        $show->field('store_id', __('Store id'));
        $show->field('in_stock', __('In stock'));
        $show->field('sale_stock', __('Sale stock'));
        $show->field('warehouse_stock', __('Warehouse stock'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ProductStore());

        $stores = Store::all();

        $storeOptions = array();
        foreach ($stores as $store) {
            $storeOptions[$store->id] = $store->store_name;
        }

        $form->select('store_id', __('Store'))->options($storeOptions);
        $product = Product::all();
        $productOptions = array();
        foreach ($product as $option) {
                $productOptions[$option->id] = $option->name;
        }
        $form->select('product_id', __('Product'))->options($productOptions);
        $form->number('in_stock', __('Stock In'));
        $form->number('sale_stock', __('Stock Out'));
        return $form;
    }
}
