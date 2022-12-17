<?php

namespace Assignment\Signup\Api\Data;

interface SignupInterface
{

    /**
     * Get The Data of the signup
     *
     * @return string
     */
    public function getData();
    /**
     * @param int $id Get the id of the signup.
     * @return string
     */
    public function getById($id);

    /**
     * @param int $id delete with id.
     * @return string
     */
    public function getDelete($id);

    /**
     * @param int $id
     * @param string $name
     * @return mixed
     */
    public function setName($id, $name);
}
