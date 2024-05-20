<?php

namespace App\Admin\Controllers;

use App\Models\Invuser;
use App\Models\Store;
use App\Models\Warehouse;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InvuserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Invuser';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Invuser());

        $grid->column('id', __('Id'));
        $grid->column('username', __('Username'));
        $grid->column('password', __('Password'));
        $grid->column('role', __('Role'));

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
        $show = new Show(Invuser::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('username', __('Username'));
        $show->field('password', __('Password'));
        $show->field('role', __('Role'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Invuser());


        $form->text('username', __('Username'));
        $form->password('password', __('Password'));
        $form->select('role',__('Role'))->
        options([2 => 'Warehouse Staff', 3 => 'Store Manager'])->
        when(2, function (Form $form){
            $warehouses = Warehouse::all();
            $places = array();
            foreach ($warehouses as $warehouse) {
                $places[$warehouse->id] = $warehouse->warehouse_name;
            }
            $form->select('warehouse.warehouse_id', __('Warehouse'))->options($places);
        })->when(3, function (Form $form){
            $stores = Store::all();
            $places = array();
            foreach ($stores as $store) {
                $places[$store->id] = $store->store_name;
            }
            $form->select('store.store_id', __('Store'))->options($places);
        });

        
        return $form;
    }
}
