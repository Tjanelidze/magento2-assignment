<?php

namespace Assignment\Signup\Api;

use Assignment\Signup\Api\Data\SignupInterface;

interface SignupRepositoryInterface
{

    /**
     * Retrieve a signup by ID.
     * @param int $id The ID of the signup to retrieve.
     * @return SignupInterface|null
     */
    public function getById($id);

    /**
     * @param int $id delete with id.
     * @return SignupInterface|null
     */
    public function getDelete($id);

    /**
     * @param int $id
     * @param string $name
     * @return mixed
     */
    public function setName($id, $name);

    /**
     * Retrieve a signup Data
     * @return SignupInterface|null
     */
    public function getData();
}
