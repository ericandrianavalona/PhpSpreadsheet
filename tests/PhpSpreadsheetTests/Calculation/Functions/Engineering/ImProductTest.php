<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Engineering;

use PhpOffice\PhpSpreadsheet\Calculation\Engineering;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheetTests\Custom\ComplexAssert;
use PHPUnit\Framework\TestCase;

class ImProductTest extends TestCase
{
    const COMPLEX_PRECISION = 1E-8;

    /**
     * @var ComplexAssert
     */
    protected $complexAssert;

    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
        $this->complexAssert = new ComplexAssert();
    }

    public function tearDown()
    {
        $this->complexAssert = null;
    }

    /**
     * @dataProvider providerIMPRODUCT
     *
     * @param mixed $expectedResult
     */
    public function testIMPRODUCT($expectedResult, ...$args)
    {
        $result = Engineering::IMPRODUCT(...$args);
        $this->assertTrue(
            $this->complexAssert->assertComplexEquals($expectedResult, $result, self::COMPLEX_PRECISION),
            $this->complexAssert->getErrorMessage()
        );
    }

    public function providerIMPRODUCT()
    {
        return require 'data/Calculation/Engineering/IMPRODUCT.php';
    }
}
