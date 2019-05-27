<?php

namespace App\Admin\Controllers;

use App\Model\Collect;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CollectController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Collect);

        $grid->c_id('C id');
        $grid->user_id('User id');
        $grid->goods_id('Goods id');
        $grid->goods_name('Goods name');
        $grid->goods_price('Goods price');
        $grid->goods_num('Goods num');
        $grid->goods_img('Goods img');
        $grid->is_del('Is del');

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
        $show = new Show(Collect::findOrFail($id));

        $show->c_id('C id');
        $show->user_id('User id');
        $show->goods_id('Goods id');
        $show->goods_name('Goods name');
        $show->goods_price('Goods price');
        $show->goods_num('Goods num');
        $show->goods_img('Goods img');
        $show->is_del('Is del');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Collect);

        $form->number('c_id', 'C id');
        $form->number('user_id', 'User id');
        $form->number('goods_id', 'Goods id');
        $form->text('goods_name', 'Goods name');
        $form->decimal('goods_price', 'Goods price');
        $form->number('goods_num', 'Goods num');
        $form->text('goods_img', 'Goods img');
        $form->switch('is_del', 'Is del')->default(1);

        return $form;
    }
}
