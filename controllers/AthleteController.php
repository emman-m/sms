<?php

require_once 'models/User.php';

class AthleteController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        $athletes = $this->user->fetchAllAthleteWithInfo();

        return include 'views/coordinator/manage-athlete.php';
    }

    public function show($params)
    {
        if (empty($params['id'])) {
            Helper::redirect('404-not-found');
        }

        $request = $this->user->getUser($params['id']);

        if (empty($request) || $request['role'] !== UserRole::ATHLETE) {
            Helper::redirect('404-not-found');
        }

        if ($request['status'] === UserStatus::DELETED) {
            Helper::redirect('404-not-found');
        }

        $athlete = $request;

        return include 'views/coordinator/athlete.php';
    }

    /**
     * Update athlete status to active or approve
     * @todo send email to athlete for the status of the registration
     * 
     * @param mixed $request
     * @return void
     */
    public function store($request)
    {
        header('Content-Type: application/json');
        $res = $this->user->updateStatus($request['id'], UserStatus::ACTIVE);

        if (!$res) {
            echo json_encode(['success' => false]);
            exit();
        }

        echo json_encode(['success' => true]);
    }
    
    /**
     * Update athlete status to active or approve
     * @todo send email to athlete for the status of the registration
     * 
     * @param mixed $request
     * @return void
     */
    public function delete($request)
    {
        header('Content-Type: application/json');
        $res = $this->user->updateStatus($request['id'], UserStatus::DELETED);

        if (!$res) {
            echo json_encode(['success' => false]);
            exit();
        }

        echo json_encode(['success' => true]);
    }
}