<?php

namespace MFRNA\TelegramBot\Types;


/**
 * Class Game
 * @package MFRNA\TelegramBot\Types
 * @property string title
 * @property string description
 * @property PhotoSize[] photo
 * @property string|null text
 * @property MessageEntity[]|null text_entities
 * @property Animation|null animation
 */
class Game extends Type
{
    protected $validProps = ['title','description','photo','text','text_entities','animation'];
    protected $readOnly = ['title','description','photo','text','text_entities','animation'];
}