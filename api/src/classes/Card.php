<?php
class Card implements JsonSerializable{
	private $id;
	private $name;
	private $code;
	private $rarity;
	private $type;
	private $description;
	private $img;
	private $gangName;
	private $cardType;

	public function __construct(array $data) {
		if (isset($data['id'])) {
			$this->id = $data['id'];
		}

		$this->name = $data['name'];
		$this->code = $data['code'];
		$this->rarity = $data['rarity'];
		$this->type = $data['type'];
		$this->description = $data['description'];
		$this->gangName = $data['gang_name'];
		$this->cardType = $data['card_type'];

		//create img name
		$img = str_replace("\"", "", $data["name"]);
		$img = str_replace("'", "-", $img);
		$this->img = str_replace(" ", "-", strtolower($img)) . ".jpg";
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

	public function getImg() {
		return $this->img;
	}

	public function getGangName() {
		return $this->gangName;
	}

	public function getCardType() {
		return $this->cardType;
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
            'description' => $this->getDescription(),
            'img' => $this->getImg(),
            'gangName' => $this->getGangName(),
            'cardType' => $this->getCardType()
        ];
    }
}