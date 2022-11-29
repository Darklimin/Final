<?php

require_once __DIR__ . "/../Models/Image.php";
require_once __DIR__ . "/../Models/User.php";
require_once __DIR__ . "/../../helpers.php";

class ImagesController
{

    public function index()
    {
        $image = new Image();
        $images = $image->getAll();
        view(__DIR__ . '/../../Views/images/index.php', compact('images'));
    }

    public function show(int $id)
    {
        $image = (new Image())->get($id);
        $user = (new User())->get($image['user_id']);
        view(__DIR__ . '/../../Views/images/show.php', compact('image', 'user'));
    }

    public function showMy(int $id): void
    {
        $image = new Image();
        $userImages = $image->getOwned($id);
        view(__DIR__ . '/../../Views/images/myImages.php', compact('userImages'));
    }

    public function store(array $request)
    {
        $image = (new Image());
        $request['user_id'] = $_SESSION['user_id'];
        $data = $image->uploadImage($request);
        unset($data['files']);
        $image->create($data);
    }

    public function create()
    {
        view(__DIR__ . '/../../Views/images/create.php');
    }

    public function edit($id)
    {
        $image = new Image();
        $image = $image->get($id);

        view(__DIR__ . '/../../Views/images/edit.php', compact('image'));
    }

    public function update(array $data)
    {
        $image = (new Image())->update($data);
    }

    public function delete($id)
    {
        $image = (new Image())->delete($id);
    }

    public function like(array $id)
    {
        $image = (new Image())->like($id);
    }
}
