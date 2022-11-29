<?php

require_once __DIR__ . "/../Models/User.php";
require_once __DIR__ . "/../Models/Image.php";
require_once __DIR__ . "/../auth/Authenticate.php";

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
        $status = 1;
        $input = [];
        if ($request) {
            foreach ($request as $name => $value) {
                if (!$value) {
                    $status = 0;
                } else $input[$name] = $value;
            }
        } else $status = 0;
        if ($status === 1) {
            $user = (new User());
            $data = $user->uploadPhoto($request);
            unset($data['files']);
            $user->create($data);
        } else {
            $_SESSION['errors'] = ["You must correctly fill all fields"];
        }
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
