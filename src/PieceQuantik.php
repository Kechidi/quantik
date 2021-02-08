<?php 

    namespace quantik\src;
    

    class PieceQuantik {

        public const WHITE = 0;
        public const BLACK = 1;
        public const VOID = 0;
        public const CUBE = 1;
        public const CONE = 2;
        public const CYLINDRE = 3;
        public const SPHERE = 4;

        private const FOMRE_COULEUR =
        [
            self::VOID     => "[VOID]",
            self::CUBE     => [self::WHITE => "[Cu:W]", self::BLACK => "[Cu:B]"],
            self::CONE     => [self::WHITE => "[Co:W]", self::BLACK => "[Co:B]"],
            self::CYLINDRE => [self::WHITE => "[Cy:W]", self::BLACK => "[Cy:B]"],
            self::SPHERE   => [self::WHITE => "[Sp:W]", self::BLACK => "[Sp:B]"],
        ];


        protected int $forme;
        protected int $couleur;
        
        

        private function __construct(int $forme, int $couleur) 
        {
            $this->forme   = $forme;
            $this->couleur = $couleur;
        }

        public function getForme(): int {
            return $this->forme;
        }
        

        public function getCouleur(): int {
            return $this->couleur;
        }


        public function __toString(): string
        {
            $forme = $this->forme;
            if ( $forme == self::VOID ) return self::FOMRE_COULEUR[$forme];
            return self::FOMRE_COULEUR[$forme][$this->couleur];
        }


        public static function initVoid(): self {
            return new PieceQuantik(self::VOID, self::WHITE);
        }
        
        public static function initWhiteCube(): self {
            return new PieceQuantik(self::CUBE, self::WHITE);
        }

        public static function initBlackCube(): self {
            return new PieceQuantik(self::CUBE, self::BLACK);
        }

        public static function initWhiteCone(): self {
            return new PieceQuantik(self::CONE, self::WHITE);
        }

        public static function initBlackCone(): self {
            return new PieceQuantik(self::CONE, self::BLACK);
        }
        
        public static function initWhiteCylindre(): self {
            return new PieceQuantik(self::CYLINDRE, self::WHITE);
        }
        
        public static function initBlackCylindre(): self {
            return new PieceQuantik(self::CYLINDRE, self::BLACK);
        }
        
        public static function initWhiteSphere(): self {
            return new PieceQuantik(self::SPHERE, self::WHITE);
        }

        public static function initBlackSphere(): self {
            return new PieceQuantik(self::SPHERE, self::BLACK);
        }
    }
?>
