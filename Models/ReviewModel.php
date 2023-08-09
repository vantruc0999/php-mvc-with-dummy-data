<?php

class ReviewModel
{
    private $review_lists;

    public function __construct()
    {
        global $reviews;
        $this->review_lists = $reviews;
    }

    public function getAllProductReviews(){
        return $this->review_lists;
    }
}
