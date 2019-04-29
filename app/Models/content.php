<?php

namespace App\Models;


class Content extends Model
{
    // Renvoie une liste de contenus
    public function getContent()
    {
        $sql = 'SELECT * FROM posts';
        $content = $this->executerRequete($sql);
        return $content->fetchAll();
    }
}