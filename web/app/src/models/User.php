<?php

namespace App\Model;

use App\Exceptions\InvalidArgumentException;
use App\Model\ActiveRecordEntity;
use App\Services\UsersAuthService;

class User extends ActiveRecordEntity
{
    protected $name;

    protected $emailOrPhone;

    protected $password;

    protected $authToken;

    public static function signUp(array $input)
    {
        if (empty($input['name'])) {
            throw new InvalidArgumentException('Name empty');
        }

        if (strlen($input['name']) < 3) {
            throw new InvalidArgumentException('Min length is 3');
        }

        if (empty($input['email_or_phone'])) {
            throw new InvalidArgumentException('Email or number field empty');
        }

        // check is it a phone number
        if (strpos($input['email_or_phone'], '+') === 0) {
            if (!preg_match('/^\+[0-9]{8}$/', $input['email_or_phone'])) {
                throw new InvalidArgumentException('Wrong format. Accept only +########');
            }
        } else {
            if (!filter_var($input['email_or_phone'], FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException('Email incorrect');
            }
        }

        if (empty($input['password'])) {
            throw new InvalidArgumentException('Password empty');
        }

        if (mb_strlen($input['password']) < 8) {
            throw new InvalidArgumentException('Min password length is 8');
        }
        if ($input['password'] != $input['password_confirmation']) {
            throw new InvalidArgumentException('Password mismatch');
        }

        if (static::findOneByColumn('email', $input['email']) !== null) {
            throw new InvalidArgumentException('This is email already usage');
        }

        $user = new User();
        $user->name = $input['name'];
        $user->emailOrPhone = $input['email_or_phone'];
        $user->password = password_hash($input['password'], PASSWORD_DEFAULT);
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();
        return $user;
    }

    public static function login(array $input): User
    {
        if (empty($input['email_or_phone'])) {
            throw new InvalidArgumentException('Email or number field empty');
        }

        // check is it a phone number
        if (strpos($input['email_or_phone'], '+') === 0) {
            if (!preg_match('/^\+[0-9]{8}$/', $input['email_or_phone'])) {
                throw new InvalidArgumentException('Wrong format. Accept only +########');
            }
        } else {
            if (!filter_var($input['email_or_phone'], FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException('Email incorrect');
            }
        }

        if (empty($input['password'])) {
            throw new InvalidArgumentException('Password empty');
        }

        $user = static::findOneByColumn('email_or_phone', $input['email_or_phone']);
        if ($user === null) {
            throw new InvalidArgumentException('Email not found');
        }

        if (!password_verify($input['password'], $user->getPassword())) {
            throw new InvalidArgumentException('Wrong password');
        }

        $user->refreshAuthToken();
        $user->save();
        return $user;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getAuthToken(): string
    {
        return $this->authToken;
    }

    public function setAuthToken($authToken): void
    {
        $this->authToken = $authToken;
    }

    public function getEmailOrPhone(): string
    {
        return $this->emailOrPhone;
    }

    public function setEmailOrPhone($emailOrPhone): void
    {
        $this->emailOrPhone = $emailOrPhone;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    private function refreshAuthToken()
    {
        $this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}
