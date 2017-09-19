<?php

namespace App\Resource;

use App\Resource;
use OcUser as UserEntity;

class User extends Resource
{	
	/**
     * @param $email
     * @param $password
     * @return array
     */
    public function createUser($email, $password)
    {
        $user = new UserEntity();
        $user->setEmail($email);
        $user->setPassword($password);

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return $this->toArray($user);
    }

    /**
     * @param $id
     * @param $email
     * @param $password
     * @return array|null
     */
    public function updateUser($id, $email, $password)
    {
        /**
         * @var \App\Entity\User $user
         */
        $repository = $this->getEntityManager()->getRepository($this->entityName);
        $user = $repository->find($id);

        if ($user === null) {
            return null;
        }

        $user->setEmail($email);
        $user->setPassword($password);
        $user->setUpdated(new \DateTime());

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return $this->toArray($user);
    }
}