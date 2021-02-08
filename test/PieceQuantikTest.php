<?php

namespace quantik;

use PHPUnit\Framework\TestCase;
use quantik\src\PieceQuantik;

require_once ("../src/PieceQuantik.php");

class PieceQuantikTest extends TestCase
{
    public function testGetCouleur()
    {
        $p = PieceQuantik::initBlackCylindre();
        self::assertEquals(PieceQuantik::BLACK, $p->getCouleur());
    }

    public function testGetForme()
    {
        $p = PieceQuantik::initBlackCylindre();

        self::assertEquals(PieceQuantik::CYLINDRE, $p->getForme());
    }

    public function testWhiteCylindre()
    {
        $p = Piecequantik::initWhiteCylindre();
        $this ->assertInstanceOf(
            PieceQuantik::class,
            $p
        );
        self::assertEquals(PieceQuantik::CYLINDRE, $p->getForme());
        self::assertEquals(PieceQuantik::WHITE, $p->getCouleur());

    }

    public function testWhiteCube()
    {
        $p = Piecequantik::initWhiteCube();
        $this ->assertInstanceOf(
            PieceQuantik::class,
            $p
        );
        self::assertEquals(PieceQuantik::CUBE, $p->getForme());
        self::assertEquals(PieceQuantik::WHITE, $p->getCouleur());

    }

    public function testWhiteCone()
    {
        $p = Piecequantik::initWhiteCone();
        $this ->assertInstanceOf(
            PieceQuantik::class,
            $p
        );
        self::assertEquals(PieceQuantik::CONE, $p->getForme());
        self::assertEquals(PieceQuantik::WHITE, $p->getCouleur());

    }

    public function testWhiteSphere()
    {
        $p = Piecequantik::initWhiteSphere();
        $this ->assertInstanceOf(
            PieceQuantik::class,
            $p
        );
        self::assertEquals(PieceQuantik::CYLINDRE, $p->getForme());
        self::assertEquals(PieceQuantik::WHITE, $p->getCouleur());

    }
    public function testInitBlackCylindre()
    {
        $p = PieceQuantik::initBlackCylindre();
        $this->assertInstanceof(
            PieceQuantik::class,
            $p
        );
        self::assertEquals(PieceQuantik::CYLINDRE, $p->getForme());
        self::assertEquals(PieceQuantik::BLACK, $p->getCouleur());
    }

    public function testInitBlackCube()
    {
        $p = PieceQuantik::initBlackCube();
        $this->assertInstanceof(
            PieceQuantik::class,
            $p
        );
        self::assertEquals(PieceQuantik::CUBE, $p->getForme());
        self::assertEquals(PieceQuantik::BLACK, $p->getCouleur());
    }

    public function testInitBlackSphere()
    {
        $p = PieceQuantik::initBlackSphere();
        $this->assertInstanceof(
            PieceQuantik::class,
            $p
        );
        self::assertEquals(PieceQuantik::SPHERE, $p->getForme());
        self::assertEquals(PieceQuantik::BLACK, $p->getCouleur());
    }

    public function test__toString()
    {

        $p1 = PieceQuantik::initVoid();
        self::assertEquals("[VO]", $p1->__toString());

        $p2 = PieceQuantik::initWhiteSphere();
        self::assertEquals("[SP,W]", $p2->__toString());

        $p3 = PieceQuantik::initBlackCone();
        self::assertEquals("[CO,B]", $p3->__toString());

    }

    public function testInitVoid()
    {
        $p = PieceQuantik::initVoid();
        $this->assertInstanceof(
            PieceQuantik::class,
            $p
        );
        self::assertEquals(PieceQuantik::VOID, $p->getForme());
    }
    public function testInitBlackCone()
    {
        $p = PieceQuantik::initBlackCone();
        $this->assertInstanceof(
            PieceQuantik::class,
            $p
        );
        self::assertEquals(PieceQuantik::CONE, $p->getForme());
        self::assertEquals(PieceQuantik::BLACK, $p->getCouleur());
    }

}