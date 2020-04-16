<?php

namespace Woodbrass\Model;


interface ModelInterface extends \JsonSerializable, \Serializable
{
	public function json(): String;
}