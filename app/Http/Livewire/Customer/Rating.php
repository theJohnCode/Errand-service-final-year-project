<?php

namespace App\Http\Livewire\Customer;

use App\Models\Rating as UserRating;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Rating extends Component
{
    public $userId;
    public $rating;
    public $review;

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'nullable|string|max:500',
    ];

    public function mount($user)
    {
        $this->userId = $user;
    }

    public function saveRating()
    {
        $this->validate();

        // Check if the user is attempting to rate themselves
        if ($this->userId == Auth::id()) {
            toastr()->error('You cannot rate yourself.', 'Error');
            return;
        }

        UserRating::create([
            'user_id' => $this->userId,
            'rating' => $this->rating,
            'review' => $this->review,
            'rated_by' => Auth::id(),
        ]);

        toastr()->info('Review submitted successfully!', 'Success');

        $this->reset(['rating', 'review']);
    }

    public function render()
    {
        $user = User::with('ratings.ratedBy')->findOrFail($this->userId);

        $averageRating = $user->averageRating();

        return view('livewire.customer.rating', compact('user', 'averageRating'))->layout('layouts.base');
    }
}
