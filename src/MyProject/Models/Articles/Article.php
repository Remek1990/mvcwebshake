<?php

namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use \MyProject\Models\Users\User;
use MyProject\Services\Db;

class Article extends ActiveRecordEntity
{
    /** @var string */
    private $name;

    /** @var string */
    private $text;

    /** @var int */
    private $authorId;

    /** @var string */
    private $createdAt;

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    protected static function getTableName(): string
    {
        return 'articles';
    }

    /**
     * @return int
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }
}