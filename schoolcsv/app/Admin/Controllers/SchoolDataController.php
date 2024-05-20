<?php

namespace App\Admin\Controllers;

use App\Models\SchoolData;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SchoolDataController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'SchoolData';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SchoolData());

        $grid->column('id', __('Id'));
        $grid->column('school_name', __('School name'));
        $grid->column('name', __('Name'));
        $grid->column('age', __('Age'));
        $grid->column('roll', __('Roll'));

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
        $show = new Show(SchoolData::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('school_name', __('School name'));
        $show->field('name', __('Name'));
        $show->field('age', __('Age'));
        $show->field('roll', __('Roll'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SchoolData());

        $form->text('school_name', __('School name'));
        $form->text('name', __('Name'));
        $form->number('age', __('Age'));
        $form->text('roll', __('Roll'));

        return $form;
    }
}
