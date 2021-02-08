<?php

namespace quantik;

require_once ("../src/ActionQuantik.php");
use PHPUnit\Framework\TestCase;
use quantik\src\PlateauQuantik;

class ActionQuantikTest extends TestCase
{
    public function test__construct()
    {
        $plateau = new PlateauQuantik();
        $act = new ActionQuantik($plateau);
        $this->assertInstanceof(ActionQuantik::class, $act);
        $act . self::assertEquals($plateau, $act->getPlateau());
    }
    public function testGetPlateau()
    {
        $plateau = new PlateauQuantik();
        $act = new ActionQuantik($plateau);
        $act . self::assertEquals($plateau, $act->getPlateau());
    }


    public function testIsRowWin()
    {
        $p= new PlateauQuantik();
        $p->setPiece(0,0,PieceQuantik::initWhiteCube());
        $p->setPiece(0,1,PieceQuantik::initWhiteSphere());
        $p->setPiece(0,2,PieceQuantik::initWhiteCylindre());
        $p->setPiece(0,3,PieceQuantik::initWhiteCone());

        $a = new ActionQuantik($p);

        self::assertTrue($a->isRowWin(0));
        self::assertFalse($a->isRowWin(1));

        $p->setPiece(2,2,PieceQuantik::initWhiteCylindre());
        $p->setPiece(2,3,PieceQuantik::initWhiteCone());
        self::assertFalse($a->isRowWin(2));

    }


    public function testIsValidePose():void
    {
        $p = new PlateauQuantik();
        $a= new ActionQuantik($p);

        $p->setPiece(0,0,PieceQuantik::initWhiteSphere());
        $p->setPiece(0,1,PieceQuantik::initWhiteCone());
        $p->setPiece(0,2,PieceQuantik::initWhiteCube());

        self::assertEquals($a->isValidePose(0,3, PieceQuantik::initWhiteSphere()), false);

        self::assertFalse($a->isValidePose(3,2,PieceQuantik::initWhiteCube()));

        $p->setPiece(1,2,PieceQuantik::initWhiteCylindre());
        self::assertFalse($a->isValidePose(1,3, PieceQuantik::initWhiteCylindre()));
    }
    public function testIsColWin()
    {
        $plateau = new PlateauQuantik();
        $plateau->setPiece(0, 1, PieceQuantik::initWhiteCube());
        $plateau->setPiece(1, 1, PieceQuantik::initWhiteSphere());
        $plateau->setPiece(2, 1, PieceQuantik::initWhiteCone());
        $plateau->setPiece(3, 1, PieceQuantik::initBlackCylindre());

        $act = new ActionQuantik($plateau);

        $act . self::assertEquals(true, $act->isColWin(1));
        $act . self::assertEquals(false, $act->isColWin(0));
    }
    public function testIsCornerWin()
    {
        $plateau = new PlateauQuantik();
        $plateau->setPiece(0, 0, PieceQuantik::initWhiteCube());
        $plateau->setPiece(1, 0, PieceQuantik::initWhiteSphere());
        $plateau->setPiece(0, 1, PieceQuantik::initWhiteCone());
        $plateau->setPiece(1, 1, PieceQuantik::initBlackCylindre());

        $act = new ActionQuantik($plateau);

        $act . self::assertEquals(true, $act->isCornerWin(PlateauQuantik::NW));
        $act . self::assertEquals(false, $act->isCornerWin(PlateauQuantik::SE));
    }

    public function testPosePiece()
    {
        $plateau = new PlateauQuantik();

        $act = new ActionQuantik($plateau);
        $act->posePiece(1, 1, PieceQuantik::initWhiteCone());
        $act . self::assertEquals(PieceQuantik::initWhiteCone(), $plateau->getPiece(1, 1));

        $act->posePiece(1, 1, PieceQuantik::initWhiteCylindre());
        $act . self::assertEquals(PieceQuantik::initWhiteCylindre(), $plateau->getPiece(1, 1));
        $act->posePiece(1, 2, PieceQuantik::initWhiteSphere());
        $act . self::assertEquals(PieceQuantik::initWhiteSphere(), $plateau->getPiece(1, 2));
        $act->posePiece(1, 3, PieceQuantik::initBlackCube());
        $act . self::assertEquals(PieceQuantik::initBlackCube(), $plateau->getPiece(1, 3));

    }


}