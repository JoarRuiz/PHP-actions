<?php declare(strict_types=1);
include('core/php/updateParejasHelper.php');
include('core/php/DataBaseManager.php');
class updateParejasHelperTest extends PHPUnit\Framework\TestCase{
    //Prueba negativa
    public function testUpdateParejaFailure() {
        $dbMock = $this->createMock(DataBaseManager::class);
        $dbMock->expects($this->once())
            ->method('insertQuery')
            ->willReturn(false); 
        $helper = new updateParejasHelper();
        $helper->setdb($dbMock);

        $result = $helper->updatePareja('20', '4', 'concepto', 'descripcion');
        $this->assertFalse($result);
    }

    //Prueba positiva
    public function testUpdateParejaSuccess() {
        // Mock para DataBaseManager
        $dbMock = $this->createMock(DataBaseManager::class);
        $dbMock->expects($this->once())
            ->method('insertQuery')
            ->willReturn(true);

        // Instancia de updateParejasHelper y establecer el mock de DataBaseManager
        $helper = new updateParejasHelper();
        $helper->setdb($dbMock);
        $result = $helper-> updatePareja('1','1', 'concepto', 'descripcion');
        $this->assertTrue($result);
    }

}
