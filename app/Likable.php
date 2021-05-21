<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    
    public function scopeWithLikes(Builder $query){
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            "likes.tweet_id",
            "tweets.id"
        );
    }

    public function isDislikedBy(User $user){
        return (bool) $user->likes 
            ->where('tweet_id', $this->id)
            ->where('liked',false)
            ->count();
       // $this->likes->where('user_id', $user->id)->where('liked', false); 
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user){
        return (bool) $user->likes 
            ->where('tweet_id', $this->id)
            ->where('liked',true)
            ->count();

    //        $this->likes->where('user_id', $user->id)->where('liked', true); 
    }

    public function dislike($user = null){
        return $this->like($user, false);
    }

    public function like($user = null, $liked = True){
        $this->likes()->updateOrCreate(
            [
                'user_id'=> $user ? $user->id : auth()->id()
            ],
            [
                'liked'=>$liked
            ]
        );
    }

    

    

    

    
}