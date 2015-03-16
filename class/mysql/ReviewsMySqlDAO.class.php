<?php
/**
 * Class that operate on table 'reviews'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-03-01 15:03
 */
class ReviewsMySqlDAO implements ReviewsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ReviewsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM reviews WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM reviews';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM reviews ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param review primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM reviews WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ReviewsMySql review
 	 */
	public function insert($review){
		$sql = 'INSERT INTO reviews (category_id, user_id, description, name, location, latlong, media) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($review->categoryId);
		$sqlQuery->setNumber($review->userId);
		$sqlQuery->set($review->description);
		$sqlQuery->set($review->name);
		$sqlQuery->set($review->location);
		$sqlQuery->set($review->latlong);
		$sqlQuery->set($review->media);

		$id = $this->executeInsert($sqlQuery);	
		$review->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ReviewsMySql review
 	 */
	public function update($review){
		$sql = 'UPDATE reviews SET category_id = ?, user_id = ?, description = ?, name = ?, location = ?, latlong = ?, media = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($review->categoryId);
		$sqlQuery->setNumber($review->userId);
		$sqlQuery->set($review->description);
		$sqlQuery->set($review->name);
		$sqlQuery->set($review->location);
		$sqlQuery->set($review->latlong);
		$sqlQuery->set($review->media);

		$sqlQuery->setNumber($review->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM reviews';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCategoryId($value){
		$sql = 'SELECT * FROM reviews WHERE category_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
	public function queryByCategoryId2($value){
		$sql = 'SELECT rev.description, rev.name, rev.location, rev.latlong, rev.tags, cat.name as category_name, uf.username
                        FROM reviews rev, categories cat, user_info uf
                        WHERE rev.category_id = cat.id
                        and rev.user_id = uf.id
                        and category_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->execute($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM reviews WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM reviews WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM reviews WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLocation($value){
		$sql = 'SELECT * FROM reviews WHERE location = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLatlong($value){
		$sql = 'SELECT * FROM reviews WHERE latlong = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMedia($value){
		$sql = 'SELECT * FROM reviews WHERE media = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCategoryId($value){
		$sql = 'DELETE FROM reviews WHERE category_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserId($value){
		$sql = 'DELETE FROM reviews WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM reviews WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM reviews WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLocation($value){
		$sql = 'DELETE FROM reviews WHERE location = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLatlong($value){
		$sql = 'DELETE FROM reviews WHERE latlong = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMedia($value){
		$sql = 'DELETE FROM reviews WHERE media = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ReviewsMySql 
	 */
	protected function readRow($row){
		$review = new Review();
		
		$review->id = $row['id'];
		$review->categoryId = $row['category_id'];
		$review->userId = $row['user_id'];
		$review->description = $row['description'];
		$review->name = $row['name'];
		$review->location = $row['location'];
		$review->latlong = $row['latlong'];
		$review->media = $row['media'];

		return $review;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return ReviewsMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>