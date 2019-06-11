<?php
class CardMapper extends Mapper {
	public function getCards() {
		$sql = "SELECT * FROM karta";
		$res = $this->db->query($sql);

		$cards = [];
		while ($row = $res->fetch()) {
			$cards[] = new Card($row);
		}
		return $cards;
	}

	public function getCardById($id) {
		$sql = "SELECT * FROM karta WHERE id = :id";
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
		$sql = "SELECT * FROM karta WHERE name like :keyword OR code like :keyword OR description like :keyword";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(['keyword' => $keyword]);
		$results = [];

		while ($row = $stmt->fetch()) {
			$row["img"] = str_replace(" ", "-", strtolower($row["name"])) . ".jpg";
			$results[] = $row;
		}

		return $results;
	}


}