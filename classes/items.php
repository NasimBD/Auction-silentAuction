<?php


class Item{
    public $itemid;
    public $name;
    public $description;
    public $resaleprice;
    public $winbidder;
    public $winprice;

    function __construct($itemid, $name, $description, $resaleprice, $winbidder, $winprice)
    {
        $this->itemid = $itemid;
        $this->name = $name;
        $this->description = $description;
        $this->resaleprice = $resaleprice;
        $this->winbidder = $winbidder;
        $this->winprice = $winprice;
    }




    function __toString()
    {
        // TODO: Implement __toString() method.
        $output = "<h4>Item: $this->itemid</h4>".
            "<h4>Name: $this->name</h4>\n".
            "<h4>Description: $this->description</h4>\n".
            "<h4>Resale Price: $this->resaleprice</h4>\n".
            "<h4>Winning bid: $this->winbidder at $this->winprice</h4>\n";
        return $output;
    }



    function saveItem(){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "INSERT INTO items VALUES(?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('issdid', $this->itemid, $this->name, $this->description, $this->resaleprice, $this->winbidder, $this->winprice);
        $result = $stmt->execute();
        $conn->close();
        return $result;
    }



    function updateItem(){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "UPDATE items  SET name = ?, description = ?, resaleprice = ?, winbidder = ?, winprice = ? WHERE itemid = $this->itemid";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssdid',  $this->name, $this->description, $this->resaleprice, $this->winbidder, $this->winprice);
        $result = $stmt->execute();
        $conn->close();
        return $result;
    }




    function removeItem(){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "DELETE FROM items WHERE itemid = $this->itemid";
        $result = $conn->query($query);
        $conn->close();
        return $result;
    }



    static function getItems(){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "SELECT * FROM items";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            $items = array();
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                $item = new Item($row['itemid'], $row['name'], $row['description'], $row['resaleprice'], $row['winbidder'], $row['winprice']);
                array_push($items, $item);
                //unset($item);
            }
            $conn->close();
            return $items;
        }else{
            $conn->close();
            return NULL;
        }
    }



    static function getItemsbyBidder($bidderid){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "SELECT * FROM items WHERE winbidder = $bidderid";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            $items = array();
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                $item = new Item($row['itemid'], $row['name'], $row['description'], $row['resaleprice'], $row['winbidder'], $row['winprice']);

                array_push($items, $item);
                //unset($item);
            }
            $conn->close();
            return $items;
        }else{
            $conn->close();
            return NULL;
        }
    }




    static function findItem($itemid){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query  = "SELECT * FROM items WHERE itemid = $itemid";
        $result = $conn->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row){
            $item = new Item($row['itemid'], $row['name'], $row['description'], $row['resaleprice'], $row['winbidder'], $row['winprice']);
            $conn->close();
            return $item;
        }else{
            $conn->close();
            return  NULL;
        }
    }




    static function getTotalItems(){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "SELECT count(itemid) FROM items";
        $result = $conn->query($query);
        if(!$result){
            $conn->close();
            return NULL;
        }else{
            $row = $result->fetch_array();
            if($row){
                $conn->close();
                return $row[0];
            }else{
                $conn->close();
                return null;
            }
        }
    }





    static function getTotalPrice(){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "SELECT sum(resaleprice) FROM items";
        $result = $conn->query($query);
        if(!$result){
            $conn->close();
            return NULL;
        }else{
            $row = $result->fetch_array();
            if($row){
                $conn->close();
                return $row[0];
            }else{
                $conn->close();
                return NULL;
            }
        }
    }




    static function getTotalBids(){
          $conn = new mysqli("localhost", "username", "password", "auction");
          $query = "SELECT sum(winprice) FROM items";
          $result = $conn->query($query);
          if(!$result){
              $conn->close();
              return NULL;
          }else{
              $row = $result->fetch_array();
              if($row){
                  $conn->close();
                  return $row[0];
              }else{
                  $conn->close();
                  return NULL;
              }
          }
}
}
?>




















