<?php
class RankingTable {
    private $players = array();

    public function __construct($playerNames) {     //Initialize players
        foreach ($playerNames as $name) {
            $this->players[$name] = array('score' => 0, 'gamesPlayed' => 0);
        }
    }

    public function recordResult($playerName, $score)   //Add the score and one game played to the ranking
    {
        if (!isset($this->players[$playerName])) {
            throw new Exception("Player '$playerName' does not exist in the ranking table.");
        }

        $this->players[$playerName]['score'] += $score;
        $this->players[$playerName]['gamesPlayed']++;
    }

    private function cmpPlayers($a, $b)     //Comparison players function
    {  
            if ($a['score'] == $b['score']) {
                if ($a['gamesPlayed'] == $b['gamesPlayed']) {
                    return 0;
                }
                return $a['gamesPlayed'] < $b['gamesPlayed'] ? -1 : 1;
            }
            return $a['score'] < $b['score'] ? 1 : -1;
        
    }

    public function playerRank($rank) {
       
        uasort($this->players, array($this, "cmpPlayers"));     //Sorting function

        $playersArray = array_keys($this->players);
        return isset($playersArray[$rank - 1]) ? $playersArray[$rank - 1] : null;
    }
}

//Usage
$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);
echo $table->playerRank(1);
echo "\n";
?>