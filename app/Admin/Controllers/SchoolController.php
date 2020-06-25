<?php

namespace App\Admin\Controllers;

use App\School;
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
    protected $title = '学校名';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new School());

        $grid->column('id', __('Id'));
        $grid->column('school_name', __('School name'));
        $grid->column('school_name_y', __('School name y'));
        $grid->column('school_name_slug', __('School name slug'));
        $grid->column('description', __('Description'))
            ->display(function ($desc){ return mb_substr($desc, 0, 30).'... (length: '.mb_strlen($desc).')'; });
        $grid->column('document', __('Document'))
            ->display(function ($document){ return 'length: '.mb_strlen($document); });
        $grid->column('color', __('Color'));
        // $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'))
            ->display(function ($date){ return date('c', strtotime($date)); });

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
        $show->field('school_name', __('School name'));
        $show->field('school_name_y', __('School name y'));
        $show->field('school_name_slug', __('School name slug'));
        $show->field('description', __('Description'));
        $show->field('document', __('Document'));
        $show->field('color', __('Color'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

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

        $form->column(1/2, function ($form){
            $form->text('school_name', __('School name'));
            $form->text('school_name_y', __('School name y'))
                ->help('学校名にカタカナが含まれる場合はひらがなと混在させます');
            $form->text('school_name_slug', __('School name slug'))
                ->help('URLパスに使われる文字列です');
            $form->textarea('description', __('Description'))
                ->help('nl2brします HTML,Markdownで入力してはいけません');
            $form->text('color', __('Color'))
                ->help('"#"込みで入力してください');
        });
        $form->column(1/2, function ($form){
            $form->textarea('document', __('Document'))
                ->help('Markdownで入力してください');
        });

        return $form;
    }
}
