<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use \App\Page;

class PageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Page';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('picture', __('Picture'));
        $grid->column('category', __('Category'));
        $grid->column('cw', __('Cw'));
        $grid->column('color', __('Color'));
        $grid->column('document', __('Document'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Page::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('picture', __('Picture'));
        $show->field('category', __('Category'));
        $show->field('cw', __('Cw'));
        $show->field('color', __('Color'));
        $show->field('document', __('Document'));
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
        $form = new Form(new Page());

        $form->text('title', __('Title'));
        $form->image('picture', __('Picture'));
        $form->text('category', __('Category'));
        $form->switch('cw', __('Cw'));
        $form->color('color', __('Color'));
        $form->textarea('document', __('Document'));

        return $form;
    }
}
