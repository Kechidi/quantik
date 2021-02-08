<?php

namespace quantik;
require_once ('../src/PlateauQuantik.php');
require_once ('../src/PieceQuantik.php');

use PHPUnit\Framework\TestCase;
use quantik\src\PieceQuantik;
use quantik\src\PlateauQuantik;

class PlateauQuantikTest extends TestCase
{



    public function testGetCol()
    {
        $p = new PlateauQuantik();
        $p->setPiece(0, 0, PieceQuantik::initWhiteCone());
        $p->setPiece(1, 0, PieceQuantik::initWhiteCylindre());
        $p->setPiece(2, 0, PieceQuantik::initWhiteSphere());
        $p->setPiece(3, 0, PieceQuantik::initWhiteCube());

        $col= $p->getCol(0);
        $p . self::assertEquals(PieceQuantik::initWhiteCone(), $col[0]);
        $p . self::assertEquals(PieceQuantik::initWhiteCylindre(), $col[1]);
        $p . self::assertEquals(PieceQuantik::initWhiteSphere(), $col[2]);
        $p . self::assertEquals(PieceQuantik::initWhiteCube(), $col[3]);

    }


    public function testSetPiece()
    {
        $p = new PlateauQuantik();
        $p->setPiece(2,2,PieceQuantik::initWhiteCylindre());
        self::assertEquals(PieceQuantik::initWhiteCylindre(), $p->getPiece(2,2));
    }

    public function testGetPiece()
    {
        $p = new PlateauQuantik();
        $p->setPiece(0, 0, PieceQuantik::initWhiteSphere());
        $p . self::assertEquals(PieceQuantik::initWhiteSphere(), $p->getPiece(0, 0));
    }

    public function testGetRow()
    {
        $p = new PlateauQuantik();
        $p->setPiece(0, 0, PieceQuantik::initWhiteCone());
        $p->setPiece(0, 1, PieceQuantik::initWhiteCylindre());
        $p->setPiece(0, 2, PieceQuantik::initWhiteSphere());
        $p->setPiece(0, 3, PieceQuantik::initWhiteCube());

        $ligne = $p->getRow(0);
        $p . self::assertEquals(PieceQuantik::initWhiteCone(), $ligne[0]);
        $p . self::assertEquals(PieceQuantik::initWhiteCylindre(), $ligne[1]);
        $p . self::assertEquals(PieceQuantik::initWhiteSphere(), $ligne[2]);
        $p . self::assertEquals(PieceQuantik::initWhiteCube(), $ligne[3]);

    }


    public function test__construct()
    {
        $p= new plateauQuantik();
        self::assertEquals(PieceQuantik::initVoid(), $p->getPiece(0,0));
    }

    public function testGetCorner() :void{
        $p = new PlateauQuantik();
        $p->setPiece(0,0,PieceQuantik::initWhiteCylindre());
        $p->setPiece(0,1,PieceQuantik::initWhiteCylindre());
        $p->setPiece(1,0,PieceQuantik::initWhiteCylindre());
        $p->setPiece(1,1,PieceQuantik::initWhiteCylindre());

        $corner = $p->getCorner(PlateauQuantik::NW);
        self::assertEquals(PieceQuantik::initWhiteCylindre(), $corner[0]);
        self::assertEquals(PieceQuantik::initWhiteCylindre(), $corner[1]);
        self::assertEquals(PieceQuantik::initWhiteCylindre(), $corner[2]);
        self::assertEquals(PieceQuantik::initWhiteCylindre(), $corner[3]);
        
    }
    public function testGetCornerFromCoord()
    {
        $p= new PlateauQuantik();
        $p . self::assertEquals(PlateauQuantik::SE, PlateauQuantik::getCornerFromCoord(3, 3));
        $p . self::assertEquals(PlateauQuantik::NW, PlateauQuantik::getCornerFromCoord(1, 0));
        $p . self::assertEquals(PlateauQuantik::NE, PlateauQuantik::getCornerFromCoord(1, 2));
        $p . self::assertEquals(PlateauQuantik::SW, PlateauQuantik::getCornerFromCoord(3, 1));
    }

}
