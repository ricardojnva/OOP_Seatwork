<?php
require 'DB_config.php';

class Person {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createPerson($Account_Name , $Balance , $Account_Type) {
        $Account_Name  = mysqli_real_escape_string($this->conn, $Account_Name);
        $Balance = (int)$Balance;
        $Account_Type = mysqli_real_escape_string($this->conn, $Account_Type);
        
        $query = "INSERT INTO bank_account (account_name, balance, account_type) VALUES ('$Account_Name', '$Balance', '$Account_Type')";
        return mysqli_query($this->conn, $query);
    }
    public function readPersons() {
        $query = "SELECT * FROM bank_account";
        $result = mysqli_query($this->conn, $query);

        $persons = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $persons[] = $row;
        }

        return $persons;
    }
    public function withdraw($Account_Name, $Balance) {
        $Account_Name = mysqli_real_escape_string($this->conn, $Account_Name);
        $Balance = (int)$Balance;
    
        $query = "SELECT * FROM bank_account WHERE account_name = '$Account_Name'";
        $result = mysqli_query($this->conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $current_balance = $row['balance'];
    
            if ($current_balance >= $Balance) {
                $new_balance = $current_balance - $Balance;
    
                $update_query = "UPDATE bank_account SET balance = $new_balance WHERE account_name = '$Account_Name'";
                $update_result = mysqli_query($this->conn, $update_query);
    
                if ($update_result) {
                    return "$Account_Name. New balance is $new_balance";
                } else {
                    return "Error updating balance";
                }
            } else {
                return "Insufficient funds";
            }
        } else {
            return "Account not found";
        }
    }
    public function deposite($Account_Name, $Balance) {
        $Account_Name = mysqli_real_escape_string($this->conn, $Account_Name);
        $Balance = (int)$Balance;
    
        $query = "SELECT * FROM bank_account WHERE account_name = '$Account_Name'";
        $result = mysqli_query($this->conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $current_balance = $row['balance'];
    
            if ($current_balance >= $Balance) {
                $new_balance = $current_balance + $Balance;
    
                $update_query = "UPDATE bank_account SET balance = $new_balance WHERE account_name = '$Account_Name'";
                $update_result = mysqli_query($this->conn, $update_query);
    
                if ($update_result) {
                    return "$Account_Name . New balance is $new_balance";
                } else {
                    return "Error updating balance";
                }
            } else {
                return "Insufficient funds";
            }
        } else {
            return "Account not found";
        }
    }
    public function getUserDetails($Account_Name) {
        $Account_Name = mysqli_real_escape_string($this->conn, $Account_Name);
        $query = "SELECT * FROM bank_account WHERE account_name = '$Account_Name'";
        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }
    

}
?>