<?php

namespace App\Policies;

use App\Question_model;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Question_model  $questionModel
     * @return mixed
     */
    public function update(User $user, Question_model $questionModel)
    {
        return $user->id === $question->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Question_model  $questionModel
     * @return mixed
     */
    public function delete(User $user, Question_model $question)
    {
        return $user->id === $question->user_id && $question->asnwers < 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Question_model  $questionModel
     * @return mixed
     */
    public function restore(User $user, Question_model $questionModel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Question_model  $questionModel
     * @return mixed
     */
    public function forceDelete(User $user, Question_model $questionModel)
    {
        //
    }
}
