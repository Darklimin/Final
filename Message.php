<?php

class Message
{
    public const SUCCESS_HEADER = 'Success';
    public const ERROR_HEADER = 'Error';

    public function __construct(
        public $header = '',
        public $body = '',
        public $type = 'success',
    ) {
    }

    public function getErrors(): array
    {
        $errors = [];
        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];

            if (!is_array($errors)) {
                $errors = (array)$errors;
            }
            unset($_SESSION['errors']);
        }

        return $errors;
    }

    public function errors(bool $elseSuccess = true): string|null
    {
        $errors = $this->getErrors();

        if ($errors) {
            $this->header = self::ERROR_HEADER;
            $this->type = 'danger';

            foreach ($errors as $error) {
//                $this->body .= "<p>$error</p>";
                $this->body .= $error;
            }

            return $this->message();
        }

        if ($elseSuccess && ($_SESSION['status'] ?? '')) {
            $this->header = self::SUCCESS_HEADER;
            $this->type = 'success';
            return $this->message();
        }

        return null;
    }

    public function message(): string
    {
        return "
        <div class='message {$this->type}'>
            <div class='message-header'>
                {$this->header}
            </div>
            <div class='message-body'>
                {$this->body}
            </div>
        </div>";
    }
}
