<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Hash the password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the user should have the 'admin' role.
     *
     * @return $this
     */
    public function admin()
    {
        return $this->afterCreating(function (User $user) {
            $user->roles()->attach(Role::where('name', 'admin')->first()->id);
        });
    }

    /**
     * Indicate that the user should have the 'user' role.
     *
     * @return $this
     */
    public function user()
    {
        return $this->afterCreating(function (User $user) {
            $user->roles()->attach(Role::where('name', 'user')->first()->id);
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
