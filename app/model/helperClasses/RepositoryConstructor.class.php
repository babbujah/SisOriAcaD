<?php
/** * @author  Daniel Franklin
 */
class RepositoryConstructor extends TRepository
{    
    public function __construct( $class )
    {
        parent::__construct( $class );       
    }
    
    public function loadToArray( TCriteria $criteria = NULL, $callObjectLoad = TRUE )
    {
        $objects = $this->load( $criteria, $callObjectLoad ); 
        $objectArray = [];  
        foreach( $objects as $object )
               $objectArray[] = $object->toArray();
        
        return $objectArray;                    
    }
    
    public function firstToArray($callObjectLoad = TRUE)
    {
        $collection = $this->take(1)->load(null, $callObjectLoad);
        if (isset($collection[0]))
        {
            return $collection[0]->toArray();
        }
    }
        
}