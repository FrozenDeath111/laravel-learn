<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $warehouses = Warehouse::all();

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('category', __('Category'));
        $grid->column('description', __('Description'));
        $grid->column('stock_in.warehouse_id', __('Warehouse Id'));
        $grid->column('stock_in.warehouse_stock', __('Quantity'));

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('category', __('Category'));
        $show->field('description', __('Description'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->text('name', __('Name'));
        $form->text('category', __('Category'));
        $form->textarea('description', __('Description'));

        $warehouses = Warehouse::all();
        $places = array();
        foreach ($warehouses as $warehouse) {
            $places[$warehouse->id] = $warehouse->warehouse_name;
        }

        $form->select('stock_in.warehouse_id', __('Warehouse'))->options($places);
        $form->number('stock_in.warehouse_stock', __('Quantity'));

        return $form;
    }
}
