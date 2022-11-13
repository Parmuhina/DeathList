<?php
require_once "Row.php";
class Filter
{
    private array $criteria;
    private array $table;

    public function __construct(array $criteria, array $table)
    {
        $this->criteria=$criteria;
        $this->table=$table;
    }

    public function filtered ():array
    {
        $result=[];
        for($i=1; $i<count($this->table)-1; $i++) {
            $count=0;
            foreach ($this->criteria as $key => $value) {
                switch ($key){
                    case 0:
                        $this->table[$i]->getData()===$value? $count++:$count--;
                        if ($count===count($this->criteria)){
                            $result[]=$this->table[$i];
                        }
                        break;
                    case 1:
                        $this->table[$i]->getNavesCelonis()===$value? $count++:$count--;
                        if ($count===count($this->criteria)){
                            $result[]=$this->table[$i];
                        }
                        break;

                    case 2:
                        if ($this->table[$i]->getVardarbigasNavesCelonis()!=null) {
                            in_array(strtolower($value), array_map('strtolower',$this->table[$i]->getVardarbigasNavesCelonis())) ? $count++ : $count--;
                        }
                        if ($count===count($this->criteria)){
                            $result[]=$this->table[$i];
                        }
                        break;
                    case 3:
                        if ($this->table[$i]->getVardarbigasNavesLietasApstakli()!=null) {
                            in_array(strtolower($value), array_map('strtolower',$this->table[$i]->getVardarbigasNavesLietasApstakli())) ? $count++ : $count--;
                        }
                        if ($count===count($this->criteria)){
                            $result[]=$this->table[$i];
                        }
                        break;
                    case 4:
                        if ($this->table[$i]->getVardarbigasNavesVeids()!=null) {
                            in_array(strtolower($value), array_map('strtolower',$this->table[$i]->getVardarbigasNavesVeids())) ? $count++ : $count--;
                        }
                        if ($count===count($this->criteria)){
                            $result[]=$this->table[$i];
                        }
                        break;
                }

            }


        }

        return $result;
    }


}
