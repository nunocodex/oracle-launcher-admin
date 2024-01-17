<?php

namespace App\Orchid\Presenters\Vision;

use Orchid\Support\Presenter;

class AvatarPresenter extends Presenter
{
    public function image(): ?string
    {
        return $this->entity->image_url ?? null;
    }
}
