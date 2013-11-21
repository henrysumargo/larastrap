<?php

class AjaxController extends BaseController {

    /**
     * Post Model
     * @var Post
     */
    protected $post;

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Inject the models.
     * @param Post $post
     * @param User $user
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * search
     *
     * @return list of search
     */
    public function postAddressSearch()
    {
        $post = Input::all();

        $address = new Address();

        var_dump($address->search_address(array('search' => $post['search'])));

        
    }
}