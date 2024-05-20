<?php

namespace App\Admin\Controllers;

use App\Models\Employee;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EmployeeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Employee';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Employee());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('phone', __('Phone'));
        $grid->column('date_of_birth', __('Date Of Birth'));
        $grid->column('path', __('Image'))->image('', '60', '60');

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
        $show = new Show(Employee::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('phone', __('Phone'));
        $show->field('date_of_birth', __('Date Of Birth'));
        $show->field('path', __('Image'))->image('','60','60');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Employee());

        $form->text('name', __('Name'));
        $form->mobile('phone', __('Phone'));
        $form->image('path', __('Image'));
        $form->date('date_of_birth', __('Date Of Birth'));
        $form->text('details.details', __('Details'));

        $form->hasMany('jobs', function (Form\NestedForm $form) {
            $form->text('job_name', __('Jobs'));
        });

        $form->saved(function (Form $form) {

            // redirect url
            return redirect('/admin/users');
        
        });

        return $form;
    }
}
