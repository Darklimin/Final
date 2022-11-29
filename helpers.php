
<?php
function redirectIfNotAuthenticated(string $url): void
{
    if (!($_SESSION['is_authenticated'] ?? '')) {
        redirect($url);
    }
}

function redirect(string $url): void
{
    header("Location: {$url}");
    exit();
}

function dump(...$variables)
{
    foreach ($variables as $variable) {
        echo "<pre>" . print_r($variable, true) . "</pre>";
    }
}

function view($path, $data = [])
{
    //get content
    $content = getView($path, $data);
    //get document and pass content as parameter
    echo getView(__DIR__ . '/Views/app/document.php', compact('content'));
}

function getView(string $path, array $data)
{
    extract($data);
    ob_start();
    include $path;

    return ob_get_clean();
}

function getRootUrl()
{
    $config = include __DIR__ . "/config.php";

    return $config['root_uri'];
}

function publicUrl(string $url = ''): string
{
    return getRootUrl() . 'public/' . $url;
}

function storageUrl(string $url = ''): string
{
    return getRootUrl() . 'storage/' . $url;
}

function imagesUrl(string $name): string
{
    return storageUrl() . 'images/' . $name;
}

function photosUrl(string $name): string
{
    return storageUrl() . 'photos/' . $name;
}
