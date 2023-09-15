<?php

class Prvek {   
  public $data;
  public $next;
  public $last;  

    function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->last = null;   
    }
}

class TridenySeznam { 
    public $head;
    public $tail;  
    public $type; //typ seznamu "integer" nebo "string"

    function __construct() {
        $this->head = null;
        $this->tail = null;  
        $this->type = null;
    }

    //vloží prvbek do seznamu - najde místo -zatøídí
    function vlozPrvek($data) {

        //do prázdného seznamu
        if ($this->head === null) {   
            if ((gettype($data)=='integer')||(gettype($data)=='string')) {
                $this->type = gettype($data);  
                $prvek = new Prvek($data);  
                $this->head = $prvek;
                $this->tail = $prvek;     
                return "Prvek ".$data." vlozen do prazdneho seznamu <br>";  
            } else {
                return "Spatny typ dat <br>";
            }
        } 
        //kontrola typu dat
        if (gettype($data)==$this->type) {
            $prvek = new Prvek($data);
            //najde prvni vetsi. Kdyz vrati null, je nejvetsi tento
            $vetsi=$this->najdiVetsi($data);
             
            //do jednoprvkoveho seznamu
            if ($this->head === $this->tail) { 
                if ($vetsi===null) {
                    $this->head->next = $prvek;
                    $prvek->last = $this->head;
                    $this->tail = $prvek;
                    return "Prvek ".$data." vlozen do jednoprvkoveho seznamu na konec <br>";
                } else {
                    $this->tail->last = $prvek;
                    $prvek->next = $this->tail;
                    $this->head = $prvek;                       
                    return "Prvek ".$data." vlozen do jednoprvkoveho seznamu na zacatek <br>";
                }
            }
            
            //do seznamu
            //na konec
            if ($vetsi===null) {
                $this->tail->next = $prvek;
                $prvek->last = $this->tail;
                $this->tail = $prvek;
                return "Prvek ".$data." vlozen do seznamu na konec <br>";
            } 
            //na zacatek
            if ($vetsi==$this->head) {
                $this->head->last = $prvek;
                $prvek->next = $this->head;
                $this->head = $prvek; 
                return "Prvek ".$data." vlozen do seznamu na zacatek <br>";
            }
            //nekam
            $vetsi->last->next = $prvek;
            $prvek->last = $vetsi->last;
            $prvek->next = $vetsi;
            $vetsi->last = $prvek; 
            return "Prvek ".$data." vlozen do seznamu <br>";
            
        } else {
            return "Spatny typ dat <br>";
        }
    }         

    // vyhledávání prvku
    function najdiPrvek($data) {
        $current = $this->head;
        while ($current) {
            if ($current->data === $data) {  
                return $current;
            }
            $current = $current->next;
        }
        // nenašel   
        return null;
    }   
    
    // vyhledávání prvního vìtšího
    function najdiVetsi($data) {
        $current = $this->head;
        while ($current) {
        //našel
            if ($this->type=='integer') {
                if ($current->data >$data) { 
                    return $current;
                }
            } else {
                 $strcmp = strcmp($current->data, $data);
                 if ($strcmp>0) {               
                     return $current;
                 }
            }   
            $current = $current->next;
        }
        // nenašel - hledaný je nejvìtší
        return null;
    }          
    
    // vyhledávání prvního menšího
    function najdiMensi($data) {
        $current = $this->tail;
        while ($current) {
        //našel
            if ($this->type=='integer') {
                if ($current->data <$data) { 
                    return $current;
                }
            } else {
                 $strcmp = strcmp($current->data, $data);
                 if ($strcmp<0) {               
                     return $current;
                 }
            }   
            $current = $current->last;
        }
        // nenašel - hledaný je nejmenší
        return null;
    }

    // délka seznamu
    function delka() {
        $length = 0;
        $current = $this->head;
        while ($current !== null) {
            $length++;
            $current = $current->next;
        }
        return $length;
    }

    // najde a smaže prvek
    function smazPrvek($data) {
        $current = $this->head;
        while ($current !== null) {
            if ($current->data === $data) {
                break;
            }
            $current = $current->next;
        }
        // nenašel
        if ($current === null) {
            return null;
        }  
        //mažu head
        if ($current->last === null) {
            if ($current->next === null) {
            $this->head = null;
            $this->tail = null;
            $this->type = null;
            $current->data = null;  
            return $data;    
            }    
            $current->next->last = null;
            $this->head = $current->next;
            $current->next = null;
            $current->data = null;   
            return $data;    
        }
        //mažu tail
        if ($current->next === null) {
            $current->last->next = null;
            $this->tail = $current->last;
            $current->last = null;
            $current->data = null; 
            return $data;    
        }
        //mažu uprostøed
        $current->last->next = $current->next;
        $current->next->last = $current->last;
        $current->next = null;
        $current->last = null;
        $current->data = null;  
        return $data;    
    }
    
    // vytiskne seznam
    function tisk() {
        $tisk="";  
        $current = $this->head;
        while ($current) {
            $tisk.= $current->data;
            if ($current = $current->next) {
               $tisk.= " -> ";
            }
        }
    return $tisk;
    }        
    // vytiskne podrobný seznam
    function tiskVelky() {
        $tisk="";  
        $current = $this->head;
        $tisk.= "head:".$this->head->data." seznam:";
        while ($current) {
            $tisk.= "(".$current->last->data.")".$current->data."(".$current->next->data.")";
            if ($current = $current->next) {
                $tisk.= " -> ";
            }
        }
        $tisk.= " tail:".$this->tail->data." delka: ".$this->delka()." typ:".$this->type;
        return $tisk;
    }
}

?>
