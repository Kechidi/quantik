<?php 

    namespace quantik\src;
    
    require_once("../src/PlateauQuantik.php");
    require_once("../src/PieceQuantik.php");
    
    use quantik\src\PlateauQuantik;
    use quantik\src\PieceQuantik;
    

    class ActionQuantik {
    

        protected PlateauQuantik $plateauQuantik;

        public function __construct(PlateauQuantik $plateau){
            $this->plateauQuantik = $plateau;
        }

        public function getPlateau(): PlateauQuantik {
            return $this->plateauQuantik;
        }
       
        public function isRowWin(int $rowNum): bool {
            return self::isComboWin($this->plateauQuantik->getRow($rowNum)); 
        }

        public function isColWin(int $colNum): bool { 
            return self::isComboWin($this->plateauQuantik->getCol($colNum)); 
        }

        public function isCornerWin(int $dir): bool {
            return self::isComboWin($this->plateauQuantik->getCorner($dir)); 
        }
        

        public function isValidePose(int $rowNum, int $colNum, PieceQuantik $piece): bool{
            if ( $piece->getForme() == PieceQuantik::VOID ) return false;
            $piecePlateau = $this->plateauQuantik->getPiece($rowNum, $colNum);
            if ( $piecePlateau->getForme() != PieceQuantik::VOID ) return false;
                
            $dir = $this->plateauQuantik->getCornerFromCoord($rowNum, $colNum);
               
            return self::isPieceValide($this->plateauQuantik->getRow($rowNum), $piece) &&
                   self::isPieceValide($this->plateauQuantik->getCol($colNum), $piece) &&
                   self::isPieceValide($this->plateauQuantik->getCorner($dir), $piece);
                       
        }
        

        public function posePiece(int $rowNum, int $colNum, PieceQuantik $piece){
            if ( $this->isValidePose($rowNum, $colNum, $piece) )
                $this->plateauQuantik->setPiece($rowNum, $colNum, $piece);
        }
        

        public function __toString(): string{
            return strval($this->plateauQuantik); 
        }

        private static function isComboWin(array $pieces): bool{
            $pPassees = array();
            $color = $pieces[0]->getCouleur();
            $array = [PieceQuantik::CUBE => 0, PieceQuantik::CONE => 0, PieceQuantik::SPHERE => 0, PieceQuantik::CYLINDRE => 0];
            foreach( $pieces as $p ) {
                $forme = $p->getForme();
                if ( $forme == PieceQuantik::VOID ) return false;
                if ( $array[$forme] > 0 ) return false;
                $array[$forme]++;
            }
            return true;
        }
        

        private static function isPieceValide(array $pieces, PieceQuantik $piece): bool{
            foreach( $pieces as $p2 ) {
                if ( $p2->getForme() == $piece->getForme() && 
                     $p2->getCouleur() != $piece->getCouleur() ) return false;
            }
            return true;
        }
    }
?>
