<?php

class Model
{
  
    public static $connection;

    private $conf = 'default';

    protected $table = false;

    private $db;

    protected $primaryKey = 'id';

    private $id;

  
    public function __construct()
    {
        $conf = Configuration::init_config();
     
    
        if (false === $this->table) {
            $this->table = str_replace("model","",strtolower(get_class($this)).'s');
       
        }
       
        if ( isset(Model::$connection)) {
            $this->db = Model::$connection;
            

            return true;
        }

        try {
            $pdo = new PDO(
                'mysql:host='.$conf['host'].';dbname='.$conf['base'].';',
                $conf['user'],
                $conf['password'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

            Model::$connection= $pdo;
            $this->db = $pdo;
        } catch (PDOException $e) {
        
             die('Impossible de se connecter à la base de donnée');
        }
    }


    public function find2($req)
    {
        $sql = 'SELECT ';

        if (isset($req['fields'])) {
            if (is_array($req['fields'])) {
                $sql .= implode(',' , $req['fields']);
            } else {
                $sql .= $req['fields'];
            }
        } else {
            $sql .= '*';
        }

        $sql .= ' FROM '.$this->table.' ';

        if (isset($req['join'])) {
            foreach ($req['join'] as $key => $value) {
                $sql .= 'LEFT JOIN '.$key.' ON '.$value.' ';
            }
        }

        if (isset($req['conditions'])) {
            $sql .= 'WHERE ';

            if (!is_array($req['conditions'])) {
                $sql .= $req['conditions'];
            } else {
                $cond = array();
                foreach ($req['conditions'] as $k => $v) {
                    if (!is_numeric($v)) {
                        $v = '"'.$v.'"';
                    }

                    $cond[] = "$k=$v";
                }

                $sql .= implode(' AND ',$cond);
            }
        }

        if (isset($req['order'])) {
            $sql .= ' ORDER BY '.$req['order']['field'].' '.$req['order']['sc'];
        }
        
        if (isset($req['group'])) {
            $sql .= ' GROUP BY '.$req['group']['field'].' '.$req['group']['sc'];
        }

        if (isset($req['limit'])) {
            $sql .= ' LIMIT '.$req['limit'];
        }

        $pre = $this->db->prepare($sql);
        $pre->execute();

        return $pre->fetchAll(PDO::FETCH_OBJ);
    }

        public function find($req)
    {
        $sql = 'SELECT ';

        if (isset($req['fields'])) {
            if (is_array($req['fields'])) {
                $sql .= implode(',' , $req['fields']);
            } else {
                $sql .= $req['fields'];
            }
        } else {
            $sql .= '*';
        }

        $sql .= ' FROM '.$this->table.' ';

        if (isset($req['join'])) {
            foreach ($req['join'] as $key => $value) {
                $sql .= 'LEFT JOIN '.$key.' ON '.$value.' ';
            }
        }

        if (isset($req['conditions'])) {
            $sql .= 'WHERE ';

            if (!is_array($req['conditions'])) {
                $sql .= $req['conditions'];
            } else {
                $cond = array();
                foreach ($req['conditions'] as $k => $v) {
                    if (!is_numeric($v)) {
                        $v = '"'.$v.'"';
                    }

                    $cond[] = "$k=$v";
                }

                $sql .= implode(' AND ',$cond);
            }
        }

        if (isset($req['order'])) {
            $sql .= ' ORDER BY '.$req['order']['field'].' '.$req['order']['sc'];
        }

        if (isset($req['limit'])) {
            $sql .= ' LIMIT '.$req['limit'];
        }

        $pre = $this->db->prepare($sql);
        $pre->execute();

        return $pre->fetchAll(PDO::FETCH_OBJ);
    }

    public function findFirst($req)
    {
        return current($this->find($req));
    }


    public function query($sql)
    {
        
        $pre = $this->db->prepare($sql);
         $pre->execute();
         return $pre->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function query2($sql)
    {
        
        $pre = $this->db->prepare($sql);
         $pre->execute();
    }

    
    public function save($data)
    {
        $key = $this->primaryKey;

        $fields = array();
        $d = array();

        foreach ($data as $k => $value) {
            if ($k != $this->primaryKey) {
                $fields[] = $k.'=:'.$k;
                $d[':'.$k] = $value;
            } elseif (!empty($value)) {
                $d[':'.$k] = $value;
            }
        }
        
        if (isset($data->$key) && !empty($data->$key)) {
           
            $sql = 'UPDATE '.$this->table.' SET '.implode(',', $fields).' WHERE '.$key.'=:'.$key;
            $this->id = $data->$key;
            $action = 'update';
        } else {
             
            $sql = 'INSERT INTO '.$this->table.' SET '.implode(',', $fields);
            $action = 'insert';
        }

        $pre = $this->db->prepare($sql);

        $pre->execute($d);

        if ('insert' === $action) {
            $this->id = $this->db->lastInsertId();
        }

        return true;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = $id;";
        $this->db->query($sql);

        return true;
    }
    public function getId()
    {
       return $this->id;
    }

  
}
