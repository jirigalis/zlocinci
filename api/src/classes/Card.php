<?php
class Card implements JsonSerializable{
	private $id;
	private $name;
	private $code;
	private $rarity;
	private $type;
	private $description;

	public function __construct(array $data) {
		if (isset($data['id'])) {
			$this->id = $data['id'];
		}

		$this->name = $data['name'];
		$this->code = $data['code'];
		$this->rarity = $data['rarity'];
		$this->type = $data['type'];
		$this->description = $data['description'];
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getCode() {
		return $this->code;
	}

	public function getRarity() {
		return $this->rarity;
	}

	public function getType() {
		return $this->type;
	}

	public function getDescription() {
		return $this->description;
	}

    public function jsonSerialize()
    {
        return 
        [
            'id'   => $this->getId(),
            'name' => $this->getName(),
            'code' => $this->getCode(),
            'rarity' => $this->getRarity(),
            'type' => $this->getType(),
            'description' => $this->getDescription()
        ];
    }
}