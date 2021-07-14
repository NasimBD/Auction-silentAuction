<?php

class Bidder{
    public $bidderid;
    public $firstname;
    public $lastname;
    public $address;
    public $phone;

    function __construct($bidderid, $firstname, $lastname, $address, $phone)
    {
        $this->bidderid = $bidderid;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->address = $address;
        $this->phone = $phone;
    }


    function __toString()
    {
        // TODO: Implement __toString() method.
        $output = "<h4>Bidder ID= $this->bidderid</h4>\n".
            "<h4>$this->firstname, $this->lastname</h4>\n".
            "<h4>$this->address, $this->phone</h4>";
        return $output;
    }


    function saveBidder(){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "INSERT INTO bidders VALUES(?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('issss',$this->bidderid, $this->firstname, $this->lastname, $this->address, $this->phone);
        $result = $stmt->execute();
        $conn->close();
        return $result;
    }



    function updateBidder(){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "UPDATE bidders SET bidderid = ?, firstname = ?, lastname = ?, address = ?, phone = ? WHERE bidderid = $this->bidderid";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('issss', $this->bidderid, $this->firstname, $this->lastname, $this->address, $this->phone);
        $result = $stmt->execute();
        $conn->close();
        return $result;
    }



    function removeBidder(){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "DELETE FROM bidders WHERE bidderid = $this->bidderid";
        $result = $conn->query($query);
        $conn->close();
        return $result;
    }


    static function getBidders() {
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "SELECT * FROM bidders";
        $result = $conn->query($query);
        if (mysqli_num_rows($result) > 0) {
            $bidders = array();
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $bidder = new Bidder($row['bidderid'],$row['lastname'],
                    $row['firstname'],$row['address'],$row['phone']);
                array_push($bidders, $bidder);
                unset($bidder);
            }
            $conn->close();
            return $bidders;
        } else {
            $conn->close();
            return NULL;
        }
    }



    static function findBidder($bidderid){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "SELECT * FROM bidders WHERE bidderid = $bidderid";
        $result = $conn->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row){
            $bidder = new Bidder($row['bidderid'], $row['lastname'], $row['firstname'], $row['address'], $row['phone']);
        $conn->close();
        return $bidder;
        }else{
            $conn->close();
            return NULL;
        }
    }





    static function getTotalBidders(){
        $conn = new mysqli("localhost", "username", "password", "auction");
        $query = "SELECT count(bidderid) FROM bidders";
        $result = $conn->query($query);
        if(!$result){
            $conn->close();
            return null;
        }else{
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if($row){
                $conn->close();
                return $row['count(bidderid)'];
            }else{
                $conn->close();
                return null;
            }
        }
    }
}

?>