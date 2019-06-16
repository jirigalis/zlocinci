<?php
class CardMapper extends Mapper {
	public function getCards() {
		$sql = "SELECT k.id, k.name, k.code, k.rarity, t.name as card_type  FROM `karta` k  LEFT JOIN typ t ON k.type = t.id order by k.name";
		$res = $this->db->query($sql);

		$cards = [];
		while ($row = $res->fetch()) {
			$cards[] = new Card($row);
		}
		return $cards;
	}

	public function getCardById($id) {
		$sql = "SELECT k.id, k.name, k.code, k.rarity, k.type, k.description, g.name as gang_name, t.name as card_type  FROM `karta` k LEFT JOIN karta_gang kg ON k.id = kg.karta_id LEFT JOIN gang g ON kg.gang_id = g.id LEFT JOIN typ t ON k.type = t.id WHERE k.id = :id";
		$card = $this->db->prepare($sql);

		try {
			$result = $card->execute(["id" => $id]);
		}
		catch (PDOException $e) {
			var_dump($e);
		}

		if ($result) {
			return new Card($card->fetch());
		}
	}

	public function getCardByCode($code) {
		$sql = "SELECT * FROM karta WHERE code LIKE :code";
		$card = $this->db->prepare($sql);

		try {
			$result = $card->execute(["code" => $code]);
		}
		catch (PDOException $e) {
			var_dump($e);
		}

		if ($result) {
			return new Card($card->fetch());
		}
	}

	public function getCardByName($name) {
		$sql = "SELECT * FROM karta WHERE name LIKE '%:name%'";
		$res = $this->db->prepare($sql);

		$cards = [];

		while ($row = $res->fetch()) {
			$cards[] = new Card($row);
		}

		return $cards;
	}

	public function search($keyword) {
		$keyword = "%".$keyword."%";
		$sql = "SELECT * FROM karta WHERE name like :keyword OR code like :keyword";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(['keyword' => $keyword]);
		$results = [];

		while ($row = $stmt->fetch()) {
			$results[] = new Card($row);
		}

		return $results;
	}

	public function insertValues() {
		return null;
	}


}