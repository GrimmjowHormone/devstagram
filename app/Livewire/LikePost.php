<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;
    //Es como un constructor en php, se manda llamar en automatico cuando se hace la instancia o se manda llamar post en la vista show.blade.php
    //Se le pasa el $post
    public function mount($post)
    {
        //Revisa si el post que lo manda llamar tiene un valor de true(si ya tiene like)
        $this->isLiked=$post->checkLike(auth()->user());
        //Va evaluar y se va asignar la cantidad de likes
        $this->likes= $post->likes->count();
       
    }
    public function like()
    {
        if ($this->post->checkLike(auth()->user())) {
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked=false;
            $this->likes--;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id,

            ]);
            $this->isLiked=true;
            $this->likes++;
        }
    }
    public function render()
    {
        return view('livewire.like-post');
    }
}
