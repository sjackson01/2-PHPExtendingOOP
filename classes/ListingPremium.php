<?php
class ListingPremium extends ListingBasic
{
    private $description;

    /**
     * Gets the local property $description
     * @return string 
     */

     public function getDescription()
     {
         return $this->description;
     }

     /** 
      * Cleans up and set the local property $description
      * @param string $value to set property
      */

      public function setDescription($value)
      {
          $this->description = trim(filter_var($value,FILTER_SANITIZE_STRING));
      }

}



?>