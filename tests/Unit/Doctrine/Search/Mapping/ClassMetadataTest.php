<?php
namespace Unit\Doctrine\Search\Mapping;

use Doctrine\Search\Mapping\ClassMetadata;

/**
 * Test class for ClassMetadata.
 * Generated by PHPUnit on 2011-12-13 at 08:33:00.
 */
class ClassMetadataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ClassMetadata
     */
    protected $classMetadata;

    protected function setUp()
    {
        $this->classMetadata = new ClassMetadata('Unit\Doctrine\Search\Documents\BlogPost');
    }

    public function test__sleep()
    {
        //removed className, because it is set by constructor and used on __wakeup
        $fields = array(
                    'boost',
                    'fieldMappings',
                    'index',
                    'numberOfReplicas',
                    'numberOfShards',
                    'opType',
                    'parent',
                    'timeToLive',
                    'type',
                    'value',
                    'reflFields',
                );

        //fill the metadata fields
        foreach ($fields as $field) {
            $this->classMetadata->$field = 1;
        }

        $serializedClass = serialize($this->classMetadata);
        $unserializedClass = unserialize($serializedClass);

        $this->assertEquals($unserializedClass, $this->classMetadata);
    }


    public function test__wakeup()
    {
        $serializedClass = serialize($this->classMetadata);
        $unserializedClass = unserialize($serializedClass);

        $this->assertEquals($unserializedClass, $this->classMetadata);
    }

    public function testGetName()
    {
        $this->assertEquals($this->classMetadata->getName(),
            'Unit\Doctrine\Search\Documents\BlogPost');
    }

    public function testGetIdentifier()
    {
        $this->assertEquals($this->classMetadata->getIdentifier(),
                    array());
    }

    public function testGetReflectionClass()
    {
        $this->assertInstanceOf('ReflectionClass', $this->classMetadata->getReflectionClass());
    }

    public function testIsIdentifier()
    {
        $this->assertFalse($this->classMetadata->isIdentifier('test'));
    }

    public function testHasField()
    {
        $this->assertFalse($this->classMetadata->hasField('testtestasdf'));
    }

    public function testHasAssociation()
    {
        $this->assertFalse($this->classMetadata->hasAssociation('testtestasdf'));
    }

    public function testIsSingleValuedAssociation()
    {
        $this->assertFalse($this->classMetadata->isSingleValuedAssociation('testtestasdf'));
    }

    public function testIsCollectionValuedAssociation()
    {
        $this->assertFalse($this->classMetadata->isCollectionValuedAssociation('testtestasdf'));
    }


    public function testGetAssociationNames()
    {
        $this->assertEquals($this->classMetadata->getAssociationNames(), array());
    }

    public function testGetTypeOfField()
    {
       $this->assertEquals('string', $this->classMetadata->getTypeOfField('className'));
       $this->assertEquals('integer', $this->classMetadata->getTypeOfField('numberOfShards'));
       $this->assertEquals('array',$this->classMetadata->getTypeOfField('fieldMappings'));
    }

    public function testGetAssociationTargetClass()
    {
        $this->assertTrue(is_string($this->classMetadata->getAssociationTargetClass('name')));
    }

    public function testIsAssociationInverseSide()
    {
        $this->assertTrue(is_string($this->classMetadata->isAssociationInverseSide('name')));
    }

    public function testGetAssociationMappedByTargetField()
    {
        $this->assertTrue(is_string($this->classMetadata->getAssociationMappedByTargetField('name')));
    }
}

?>
