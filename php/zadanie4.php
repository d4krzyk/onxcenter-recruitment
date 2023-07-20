<?php
class Thesaurus {
    private $thesaurusData;

    public function __construct($thesaurusData) {
        $this->thesaurusData = $thesaurusData;
    }

    public function getSynonyms($word) {
        $synonyms = isset($this->thesaurusData[$word]) ? $this->thesaurusData[$word] : []; //Find synonyms for word
        $result = [
            'word' => $word,
            'synonyms' => $synonyms,
        ];

        return json_encode($result); //return result to JSON
    }
}
//Usage:
$thesaurusData = array(
    "market" => array("trade"),
    "small" => array("little", "compact"),
);

$thesaurus = new Thesaurus($thesaurusData);

// Using a getSynonyms for an existing word in thesaurusData
echo $thesaurus->getSynonyms("small");
echo "\n";
// Using a getSynonyms for a non-existent word in thesaurusData
echo $thesaurus->getSynonyms("asleast");
echo "\n";
?>