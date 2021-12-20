<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uefa project</title>
</head>
<body>
    <?php
    class Player
    {
        
        public $name;
        public $position;
        public $quality;
        public $speed;
        public $injured=false;

        function __construct($name,$quality,$speed,$position){
            $this->name = $name;
            $this->quality = $quality;
            $this->speed = $speed;
            $this->position = $position;

        }
        static function sortByQuality($first,$second){
    		return $first->quality < $second->quality;
		}
            
        static function sortBySpeed($first,$second){
    		return $first->speed < $second->speed;
		}
       
        static function getTeam($position, $numberOfPlrs,$team){
            $top = [];
            foreach($team as $t => $value) {
                if(strtolower($value->position) == strtolower($position) && count($top) < $numberOfPlrs && $value->injured == false) {
                    $top[] = $value;
                }
          
            }
                return $top;	
            
        }
        static function getGoalkeeper($team){
            $topGoalkeeper = [];
                foreach($team as $t => $value){
                    if($value->position == "goalkeeper" && $value->injured == false){
                        $topGoalkeeper[] = $value;
                    break;
                } 
            }
            return $topGoalkeeper;
        }
        
    }
    
    $team[] = new Player("Peter",84,8,"striker");
    $team[] = new Player("Stephan",67,5,"midfielder");
    $team[] = new Player("Igor",72,4,"goalkeeper");
    $team[] = new Player("Mark",66,6,"defender");
    $team[] = new Player("Robert",59,6,"goalkeeper");
    $team[] = new Player("Joe",80,8,"defender");
    $team[] = new Player("Jurij",52,4,"defender");
    $team[] = new Player("Josh",76,6,"defender");
    $team[] = new Player("Mikael",71,8,"defender");
    $team[] = new Player("Ostin",64,7,"defender");
    $team[] = new Player("Mark",73,7,"midfielder");
    $team[] = new Player("Joseph",67,7,"midfielder");
    $team[] = new Player("Andrej",72,6,"midfielder");
    $team[] = new Player("Marko",52,5,"midfielder");
    $team[] = new Player("Antonio",59,6,"midfielder");
    $team[] = new Player("Uros",76,8,"midfielder");
    $team[] = new Player("Luis",70,6,"midfielder");
    $team[] = new Player("Tiery",85,9,"midfielder");
    $team[] = new Player("Joe",67,5,"midfielder");
    $team[] = new Player("Akorian",89,7,"striker");
    $team[] = new Player("Chris",62,6,"striker");
    $team[] = new Player("Elrik",70,6,"striker");


   
function Game1(){


    usort($team, array("Player","sortByQuality"));

   
    $top5def =  Player::getTeam("defender",5,$team);
    $top4mid =  Player::getTeam("midfielder",4,$team);
    $topGoalkeeper = Player::getGoalkeeper($team);
    

    usort($team, array("Player","sortBySpeed"));

    $topAtk = array_slice($team,0,1);


    $top11 = array_merge($top5def,$top4mid,$topGoalkeeper, $topAtk);


    $randomPlr = $top11[array_rand($top11)];
    $randomPlr->injured=true;
    
      
}

function Game2(){

    usort($team, array("Player","sortByQuality"));

    $top4def =  Player::getTeam("defender",4,$team);
    $top4mid =  Player::getTeam("midfielder",4,$team);
    $topGoalkeeper = Player::getGoalkeeper($team);
    $top2atk =  Player::getTeam("striker",2,$team);

    $top11 = array_merge($top4def,$top4mid,$topGoalkeeper, $top2atk);

    $randomPlr = $top11[array_rand($top11)];
    $randomPlr->injured=true;

}

function Game3(){
    usort($team, array("Player","sortByQuality"));

    $top3def =  Player::getTeam("defender",4,$team);
    $top4mid =  Player::getTeam("midfielder",4,$team);
    $topGoalkeeper = Player::getGoalkeeper($team);
    $top3atk =  Player::getTeam("striker",2,$team);

    $top11 = array_merge($top3def,$top4mid,$topGoalkeeper, $top3atk);
    
    $randomPlr = $top11[array_rand($top11)];
    $randomPlr->injured=true;

}


    ?>

</body>
</html>