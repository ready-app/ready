<?php

namespace App\Policies;

use App\Models\Assignment;
use App\Models\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AssignmentPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->is_admin
        ? Response::allow()
        : Response::deny();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Course $course, Assignment $assignment)
    {
        return (($user->courses()->where('course_id', $course->id)->exist())
        &&($user->assignments()->where('assignment_id',$assigment->id)->exist()))
        ? Response::allow()
        : Response::deny();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Course $course, Assignment $assignment)
    {
        return (($user->courses()->where('course_id', $course->id)->exist())
        &&($user->assignments()->where('assignment_id',$assigment->id)->exist()))
        ? Response::allow()
        : Response::deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Course $course, Assignment $assignment)
    {
        return (($user->courses()->where('course_id', $course->id)->exist())
        &&($user->assignments()->where('assignment_id',$assigment->id)->exist()))
        ? Response::allow()
        : Response::deny();
    }

}
