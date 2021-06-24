<?php

namespace Modules\Core\Users;

use Modules\Core\AppController;
use Modules\Core\Files\UploadService;
use Modules\Core\Users\Requests\ChangeProfileImage;
use Modules\Core\Users\Requests\DestroyUser;
use Modules\Core\Users\Requests\GetUser;
use Modules\Core\Users\Requests\GetUsers;
use Modules\Core\Users\Requests\StoreUser;
use Modules\Core\Users\Requests\UpdateUser;

class UserController extends AppController
{
    /* services */
    protected UserService $userService;
    protected UploadService $uploadService;

    public function __construct(
        UserService $us,
        UploadService $ups
    ) {
        $this->userService = $us;
        $this->uploadService = $ups;
    }

    public function index(GetUsers $request)
    {
        $filters = collect($request->all());
        $users = $this->userService->get($filters);
        return success($users);
    }

    public function store(StoreUser $request)
    {
        $raw = $request->validated();
        $user = $this->userService->store($raw);
        return success($user);
    }

    public function show(GetUser $request, $userId)
    {
        $user = $this->userService->show($userId);
        return success($user);
    }

    public function update(UpdateUser $request, $id)
    {
        $raw = $request->validated();
        $user = $this->userService->update($id, $raw);
        return success($user);
    }

    public function destroy(DestroyUser $request, $id)
    {
        $this->userService->destroy($id);
        return success();
    }

    public function change_profile_image(ChangeProfileImage $request, int $userId)
    {
        $this->userService->removeProfileImage($userId);

        $file = $this->uploadService->file(
            $request->file('file'),
            [
                'fileable_id' => $userId,
                'fileable_type' => User::class
            ]
        );

        return success($file);
    }

}
