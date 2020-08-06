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

        $form->text('title', __('Title'))
            ->help('スペースが必要な場合、アンダーバーで置き換えてください');
        $form->text('picture', __('Picture'))
            ->help('画像が格納されているURLを指定してください');
        $form->text('category', __('Category'))
            ->help('カンマ区切りで複数入力が可能です');
        $form->switch('cw', __('Cw'))
            ->help('重大なネタバレであればONにします');
        $form->text('color', __('Color'))
            ->help('キャラクターに関する記事など背景色を変える場合に入力します "#"を含める必要があります');
        $form->textarea('document', __('Document'))
            ->help('Markdownで入力してください');

        return $form;
    }
}
