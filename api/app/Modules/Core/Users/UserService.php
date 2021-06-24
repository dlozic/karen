<?php

namespace Modules\Core\Users;

use Illuminate\Support\Collection;
use Modules\Core\AppService;
use Modules\Core\Files\FileService;

class UserService extends AppService
{
    /* repositories */
    protected UserRepository $userRepository;
    protected FileService $fileService;

    public function __construct(
        UserRepository $ur,
        FileService $fs
    ) {
        $this->userRepository = $ur;
        $this->fileService = $fs;
    }

    public function get(Collection $filters)
    {
        $users = $this->userRepository
            ->search($filters)
            ->paginate();

        return $users;
    }

    public function store($formData = [])
    {
        $user = $this->userRepository->create($formData);
        return $user;
    }

    public function update($id, $formData = [])
    {
        $this->userRepository
            ->update($id, $formData)
            ->save();

        return $this->userRepository->findOrFail($id);
    }

    public function show($id)
    {
        $user = $this->userRepository->findOrFail($id);
        return $user;
    }

    public function destroy($id) { return $this->userRepository->destroy($id); }

    public function removeProfileImage($userId)
    {
        $user = $this->userRepository
            ->findOrFail($userId)
            ->load(['profileImage']);

        $file = $user->profileImage()->first();
        if(!$file) { return false; }

        return $this->fileService->destroy($file->id);
    }
}
