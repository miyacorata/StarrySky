<?php

namespace App\Admin\Controllers;

use App\Star;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StarController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Star';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Star());

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('name_y', __('Name y'));
        $grid->column('name_r', __('Name r'));
        $grid->column('name_separate', __('Name separate'));
        $grid->column('name_y_separate', __('Name y separate'));
        $grid->column('name_r_separate', __('Name r separate'));
        $grid->column('name_r_separate_secondary', __('Name r separate secondary'));
        $grid->column('birthday', __('Birthday'));
        $grid->column('cv', __('Cv'));
        $grid->column('school', __('School'));
        $grid->column('department', __('Department'));
        $grid->column('grade', __('Grade'));
        $grid->column('class_no', __('Class no'));
        // $grid->column('act_like', __('Act like'));
        // $grid->column('act_not_good', __('Act not good'));
        // $grid->column('food_like', __('Food like'));
        // $grid->column('food_dislike', __('Food dislike'));
        $grid->column('weapon_name', __('Weapon name'));
        $grid->column('weapon_category', __('Weapon category'));
        // $grid->column('document', __('Document'));
        $grid->column('color', __('Color'));
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
        $show = new Show(Star::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('name_y', __('Name y'));
        $show->field('name_r', __('Name r'));
        $show->field('name_separate', __('Name separate'));
        $show->field('name_y_separate', __('Name y separate'));
        $show->field('name_r_separate', __('Name r separate'));
        $show->field('name_r_separate_secondary', __('Name r separate secondary'));
        $show->field('birthday', __('Birthday'));
        $show->field('cv', __('Cv'));
        $show->field('school', __('School'));
        $show->field('department', __('Department'));
        $show->field('grade', __('Grade'));
        $show->field('class_no', __('Class no'));
        $show->field('act_like', __('Act like'));
        $show->field('act_not_good', __('Act not good'));
        $show->field('food_like', __('Food like'));
        $show->field('food_dislike', __('Food dislike'));
        $show->field('weapon_name', __('Weapon name'));
        $show->field('weapon_category', __('Weapon category'));
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
        $form = new Form(new Star());

        $form->column(1/2, function ($form){
            $form->text('name', __('Name'))->help('名字と名前の分割は不要です');
            $form->text('name_y', __('Name y'))->help('名字と名前の分割は不要です');
            $form->text('name_r', __('Name r'))->help('名字と名前の分割、及び頭文字の大文字化は不要です');
            $form->number('name_separate', __('Name separate'));
            $form->number('name_y_separate', __('Name y separate'));
            $form->number('name_r_separate', __('Name r separate'));
            $form->number('name_r_separate_secondary', __('Name r separate secondary'))->rules('nullable')
                ->help('中国語あるいは韓国語名で名前に2つ目の分割が必要である場合のみ入力します');
            $form->date('birthday', __('Birthday'))->default(date('2001-m-d'))
                ->help('参考：設定上の基準は高2である九九組は2001年度生まれとなります');
            $form->text('cv', __('Cv'));
            $form->text('school', __('School'));
            $form->text('department', __('Department'));
            $form->number('grade', __('Grade'));
            $form->number('class_no', __('Class no'))
                ->help('2020年現在、九九組以外は出席番号の設定はありません');
        });
        $form->column(1/2, function ($form){
            $form->text('act_like', __('Act like'));
            $form->text('act_not_good', __('Act not good'));
            $form->text('food_like', __('Food like'));
            $form->text('food_dislike', __('Food dislike'))->help('複数項目は","で区切ってください');
            $form->text('weapon_name', __('Weapon name'));
            $form->text('weapon_category', __('Weapon category'));
            $form->textarea('document', __('Document'))->help('Markdownで入力してください');
            $form->color('color', __('Color'))->help('"#"込みで入力してください');
        });


        return $form;
    }
}
