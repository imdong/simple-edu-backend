<?php

namespace App\Admin\Controllers;

use App\Teacher;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Hash;

class TeacherController extends AdminController
{
    /**
     * {@inheritdoc}
     */
    protected function title()
    {
        return trans('admin.teacher');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Teacher());

        $grid->column('id', 'ID')->sortable();
        $grid->column('username', trans('admin.username'));
        $grid->column('name', trans('admin.name'));
        $grid->column('roles', trans('admin.roles'))->pluck('name')->label();
        $grid->column('created_at', trans('admin.created_at'));
        $grid->column('updated_at', trans('admin.updated_at'));

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
        $show = new Show(Teacher::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('username', trans('admin.username'));
        $show->field('name', trans('admin.name'));
        $show->field('roles', trans('admin.roles'))->as(function ($roles) {
            return $roles->pluck('name');
        })->label();
        $show->field('created_at', trans('admin.created_at'));
        $show->field('updated_at', trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $roleModel = config('admin.database.roles_model');

        $form = new Form(new Teacher());

        $userTable = config('admin.database.users_table');
        $connection = config('admin.database.connection');

        $form->display('id', 'ID');

        $form->text('username', trans('admin.username'))
            ->creationRules(['required', "unique:{$connection}.{$userTable}"])
            ->updateRules(['required', "unique:{$connection}.{$userTable},username,{{id}}"]);

        $form->text('name', trans('admin.name'))->rules('required');
        $form->password('password', trans('admin.password'))->rules('required|confirmed');
        $form->password('password_confirmation', trans('admin.password_confirmation'))->rules('required')
            ->default(function ($form) {
                return $form->model()->password;
            });

        $form->ignore(['password_confirmation']);

        $roles = $roleModel::where('slug', 'teacher')->pluck('name', 'id');
        $form->multipleSelect('roles', trans('admin.roles'))->setDisplay(false)->options($roles);

        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        $form->hidden('type')->value('teacher');

        $form->saving(function (Form $form) use ($roles) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = Hash::make($form->password);
            }

            // 权限一定只有这个
//            $form->roles = $roles->keys()->toArray();
        });

        return $form;
    }
}
