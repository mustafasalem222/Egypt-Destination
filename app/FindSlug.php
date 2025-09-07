<?php

namespace App;

trait FindSlug
{
    public function findBySlug($slug)
    {
        return $this->where('slug', $slug);
    }
}