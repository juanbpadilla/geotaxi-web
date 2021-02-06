<?php

namespace App\Presenters;

use Illuminate\Support\HtmlString;

class UserPresenter extends Presenter
{
    public function link()
    {
        return new HtmlString("<a href='" . 
                route('usuarios.show', $this->model->id) . "'>
                {$this->model->nombre}</a>");
    }

    public function roles()
    {
        return $this->model->roles->pluck('display_name')->implode(', ');
    }

    public function notes()
    {
        return $this->model->note ? $this->model->note->body : '';
    }

    public function check($id)
    {
        return $this->model->roles->pluck('id')->contains($id) ? 'checked' : '';
    }
}