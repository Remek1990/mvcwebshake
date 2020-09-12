<?php

namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use \MyProject\Models\Users\User;
use MyProject\Services\Db;

class Article extends ActiveRecordEntity
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var int */
    protected $authorId;

    /** @var string */
    protected $createdAt;

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
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return void
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return void
     */
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    /**
     * @return void
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return void
     */
    public function setCreatedAt(string $createdAt)
    {
        $this->createdAt = $createdAt;
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