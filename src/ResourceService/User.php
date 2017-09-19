<?php

namespace App\ResourceService;

use App\ResourceService;
use App\Resource\User as Resource;

class User extends ResourceService
{
    /**
     * Get user service
     */
    public function init()
    {
		$this->setResource(new Resource($this->getEntityManager(), 'OcUser'));
    }

    /**
     * Create user
     */
    public function post()
    {
        $email = $this->getSlim()->request()->params('email');
        $password = $this->getSlim()->request()->params('password');

        if (empty($email) || empty($password) || $email === null || $password === null) {
            self::response(self::STATUS_BAD_REQUEST);
            return;
        }

        $user = $this->getService()->createUser($email, $password);

        self::response(self::STATUS_CREATED, array('user', $user));
    }

    /**
     * Update user
     */
    public function put($id)
    {
        $email = $this->getSlim()->request()->params('email');
        $password = $this->getSlim()->request()->params('password');

        if (empty($email) && empty($password) || $email === null && $password === null) {
            self::response(self::STATUS_BAD_REQUEST);
            return;
        }

        $user = $this->getService()->updateUser($id, $email, $password);

        if ($user === null) {
            self::response(self::STATUS_NOT_IMPLEMENTED);
            return;
        }

        self::response(self::STATUS_NO_CONTENT);
    }
	
	/**
     * Show options in header
     */
    public function options()
    {
        self::response(self::STATUS_OK, array(), array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'));
    }
}