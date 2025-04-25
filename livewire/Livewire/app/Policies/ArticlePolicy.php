<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return true; // Everyone can view articles
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Article $article)
    {
        return true; // Everyone can view an article
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return true; // All authenticated users can create articles
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Article $article)
    {
        // Reviewers can edit any article
        if ($user->hasRole('reviewer')) {
            return true;
        }
        
        // Regular users can only edit their own articles
        return $user->id === $article->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Article $article)
    {
        // Reviewers can delete any article
        if ($user->hasRole('reviewer')) {
            return true;
        }
        
        // Regular users can only delete their own articles
        return $user->id === $article->user_id;
    }
}
