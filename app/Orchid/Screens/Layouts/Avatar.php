<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Layouts;

use App\Orchid\Presenters\Vision\AvatarPresenter;
use Illuminate\Contracts\Support\Renderable;
use Orchid\Screen\Layouts\Content;

class Avatar extends Content
{
    /**
     * @var string
     */
    protected $template = 'presenters/avatar';

    public function render(AvatarPresenter $presenter): Renderable
    {
        return view($this->template, [
            'image_url' => $presenter->image()
        ]);
    }
}
