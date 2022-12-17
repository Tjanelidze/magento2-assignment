<?php

namespace Assignment\Signup\Model;

use Assignment\Signup\Api\SignupRepositoryInterface;
use Assignment\Signup\Model\ResourceModel\Signup\CollectionFactory;
use Assignment\Signup\Model\SignupInterface;

class SignupRepository implements SignupRepositoryInterface
{
    private $collectionFactory;
    private $signupFactory;

    public function __construct(CollectionFactory $collectionFactory, SignupFactory $signupFactory)
    {
        $this->signupFactory = $signupFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /** * @return array */
    public function getData()
    {
        try {
            return $this->collectionFactory->create()->getData();
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Retrieve a signup by ID.
     *
     * @param int $id The ID of the signup to retrieve.
     * @return array The signup with the specified ID, or null if no such signup exists.
     */
    public function getById($id)
    {
        try {
            if ($id) {
                $data = $this->signupFactory->create()->load($id)->getData();
                return ['success' => true, 'message' => json_encode($data)];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function getDelete($id)
    {
        try {
            if ($id) {
                $data = $this->signupFactory->create()->load($id);
                $data->delete();
                return "success";
            }
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
        }
        return "false";
    }

    public function setName($id, $name)
    {
        $data = $this->signupFactory->create()->load($id);
        if (!$data->getId()) {
            return ['success' => false, 'message' => 'Object not found'];
        }
        $data->setName($name)->save();
        return ['success' => true, 'message' => 'Name updated successfully'];
    }
}
