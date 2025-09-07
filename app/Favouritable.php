<?php

namespace App;

use App\Models\Favourite;

trait Favouritable
{
  public function favourites()
  {
    return $this->morphMany(Favourite::class, 'favouritable');
  }

  public function favourite(): void
  {
    $this->favourites()->create(['user_id' => auth()->id()]);
  }

  public function unfavourite(): void
  {
    $this->favourites()->where('user_id', auth()->id())->delete();
  }
}