<?php
/**
 * Class that operate on table 'reviews_attachments'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-03-01 15:03
 */
class ReviewsAttachmentsMySqlDAO implements ReviewsAttachmentsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ReviewsAttachmentsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM reviews_attachments WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM reviews_attachments';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM reviews_attachments ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param reviewsAttachment primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM reviews_attachments WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ReviewsAttachmentsMySql reviewsAttachment
 	 */
	public function insert($reviewsAttachment){
		$sql = 'INSERT INTO reviews_attachments (review_id, media) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($reviewsAttachment->reviewId);
		$sqlQuery->set($reviewsAttachment->media);

		$id = $this->executeInsert($sqlQuery);	
		$reviewsAttachment->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ReviewsAttachmentsMySql reviewsAttachment
 	 */
	public function update($reviewsAttachment){
		$sql = 'UPDATE reviews_attachments SET review_id = ?, media = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($reviewsAttachment->reviewId);
		$sqlQuery->set($reviewsAttachment->media);

		$sqlQuery->setNumber($reviewsAttachment->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM reviews_attachments';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByReviewId($value){
		$sql = 'SELECT * FROM reviews_attachments WHERE review_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMedia($value){
		$sql = 'SELECT * FROM reviews_attachments WHERE media = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByReviewId($value){
		$sql = 'DELETE FROM reviews_attachments WHERE review_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMedia($value){
		$sql = 'DELETE FROM reviews_attachments WHERE media = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ReviewsAttachmentsMySql 
	 */
	protected function readRow($row){
		$reviewsAttachment = new ReviewsAttachment();
		
		$reviewsAttachment->id = $row['id'];
		$reviewsAttachment->reviewId = $row['review_id'];
		$reviewsAttachment->media = $row['media'];

		return $reviewsAttachment;
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
	 * @return ReviewsAttachmentsMySql 
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