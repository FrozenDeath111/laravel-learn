<?php

namespace App\Admin\Controllers;

use App\Models\School;
use App\Models\SchoolData;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SchoolController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'School';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new School());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('path', __('Path'));

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
        $show = new Show(School::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('path', __('Path'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new School());

        $form->text('name', __('Name'));
        $form->file('path', __('Path'));

        $form->saved(function (Form $form) {
            $path = $form->path;

            $fileContent = file($path);
            $count = true;
            foreach ($fileContent as $line) {
                if ($count) {
                    $count = false;
                    continue;
                }

                $data = str_getcsv($line);

                $schooldata = new SchoolData();
                $schooldata->school_name = $form->name;
                $schooldata->name = $data[0];
                $schooldata->age = (int) $data[1];
                $schooldata->roll = $data[2];

                $schooldata->save();
            }

        });

        return $form;
    }
}
