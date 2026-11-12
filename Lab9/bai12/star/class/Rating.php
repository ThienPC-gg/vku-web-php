<?php
class Rating{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "coderszine_demo";    
	private $ratingUsersTable = 'rating_users';
	private $productTable = 'product';	
    private $ratingTable = 'rating';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}	
	public function userLogin($username, $password){
		$sqlQuery = "
			SELECT * 
			FROM ".$this->ratingUsersTable." 
			WHERE username='".$username."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
	}		
	public function getProductList(){
		$sqlQuery = "
			SELECT * FROM ".$this->productTable;
		return  $this->getData($sqlQuery);	
	}
	public function getProduct($itemId){
		$sqlQuery = "
			SELECT * FROM ".$this->productTable."
			WHERE id='".$itemId."'";
		return  $this->getData($sqlQuery);	
	}
	public function getProductRating($itemId){
		$sqlQuery = "
			SELECT r.ratingId, r.itemId, r.userId, u.username, u.avatar, r.ratingNumber, r.title, r.comments, r.created, r.modified
			FROM ".$this->ratingTable." as r
			LEFT JOIN ".$this->ratingUsersTable." as u ON (r.userid = u.userid)
			WHERE r.itemId = '".$itemId."'";
		return  $this->getData($sqlQuery);		
	}
	public function getRatingAverage($itemId){
		$itemRating = $this->getProductRating($itemId);
		$ratingNumber = 0;
		$count = 0;		
		foreach($itemRating as $itemRatingDetails){
			$ratingNumber+= $itemRatingDetails['ratingNumber'];
			$count += 1;			
		}
		$average = 0;
		if($ratingNumber && $count) {
			$average = $ratingNumber/$count;
		}
		return $average;	
	}
	public function saveRating($POST, $userID){		
		$insertRating = "INSERT INTO ".$this->ratingTable." (itemId, userId, ratingNumber, title, comments, created, modified) VALUES ('".$POST['itemId']."', '".$userID."', '".$POST['rating']."', '".$POST['title']."', '".$POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
		mysqli_query($this->dbConnect, $insertRating);	
	}
}
?>