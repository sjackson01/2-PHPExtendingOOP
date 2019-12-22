<?php
class ListingPremium extends ListingBasic
{
    protected $status = 'premium';
    private $description;
    protected $allowed_tags = '<p><br><b><strong><em><u><ol><ul><li>';
    /**
     * Gets the local property $description
     * @return string 
     */
    
     /**
     * Calls individual methods to set values for object properties.
     * Uses parent setValues() method to call individual methods from parent class.
     * @param array $data Data to set from user or database
     */
    public function setValues($data = []) {
        parent::setValues($data);
        if (isset($data['description'])) {
            $this->setDescription($data['description']);
        }
    }

     public function getDescription()
     {
         return $this->description;
     }

     /** 
      * Strip tags permitting allowed_tags set the local property $description
      * @param string $value to set property
      */

      public function setDescription($value)
      {     
          $this->description = trim(strip_tags($value, $this->allowed_tags));
      }

}



?>