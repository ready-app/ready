<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Assignment::class => AssignmentPolicy::class,
        Course::class => CoursePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

        Gate::define('update-post', function (User $user, 
        Course $course, Assignment $assignment) {
            //?check if user is an admin
            return ($assignment->course_id === $course->id);
        });

    }
}
