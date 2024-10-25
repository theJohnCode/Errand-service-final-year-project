<div>
    <div class="container">
        <h1 class="text-center">Ratings for {{ $user->name }}</h1>
        <p class="text-center"><strong>Average Rating:</strong> {{ number_format($averageRating, 1) }} / 5</p>

        <!-- Ratings List -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">User Reviews</h3>
            </div>
            <div class="panel-body">
                @foreach ($user->ratings as $rating)
                    <div class="media">
                        <div class="media-left">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $rating->ratedBy->name }}</h4>
                            <p><strong>Rating:</strong> {{ $rating->rating }} / 5</p>
                            <p>{{ $rating->review }}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>

        <!-- Rating Form -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Submit Your Rating</h3>
            </div>
            <div class="panel-body">
                <form wire:submit.prevent='saveRating'>
                    @csrf
                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <select wire:model="rating" id="rating" class="form-control">
                            <option value="" selected>Choose a rating</option>
                            <option value="5">5 - Excellent</option>
                            <option value="4">4 - Good</option>
                            <option value="3">3 - Average</option>
                            <option value="2">2 - Poor</option>
                            <option value="1">1 - Very Poor</option>
                        </select>
                        @error('rating')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="review">Review:</label>
                        <textarea wire:model="review" id="review" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit Rating</button>
                </form>
            </div>
        </div>
    </div>
</div>
