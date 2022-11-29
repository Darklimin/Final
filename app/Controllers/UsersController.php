<?php

require_once __DIR__ . "/../Models/User.php";
require_once __DIR__ . "/../Models/Image.php";
require_once __DIR__ . "/../Controllers/OwnersController.php";


class UsersController
{

    public function index(): void
    {
        $user = new User();
        $users = $user->getAll();
        view(__DIR__ . '/../../Views/users/index.php', compact('users'));
    }

    public function show(int $id): void
    {
        $user = (new User())->get($id);
        $userImages = (new Image())->getOwned($id);
        view(__DIR__ . '/../../Views/users/show.php', compact('user', 'userImages'));
    }

    public function register(): void
    {
        view(__DIR__ . '/../../Views/users/register_form.php');
    }

    public function store(array $request): void
    {
        $user = (new User());
        $data = $user->uploadPhoto($request);
        unset($data['files']);
        $user->create($data);
    }

    public function edit($id)
    {
        $user = new User();
        $user = $user->get($id);

        view(__DIR__ . '/../../Views/users/edit.php', compact('user'));
    }

    public function update(array $data)
    {
        $user = (new User())->update($data);
    }

    public function delete($id)
    {
        $image = (new User())->delete($id);
    }
}
