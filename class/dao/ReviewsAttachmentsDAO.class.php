<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-03-01 15:03
 */
interface ReviewsAttachmentsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ReviewsAttachments 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param reviewsAttachment primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ReviewsAttachments reviewsAttachment
 	 */
	public function insert($reviewsAttachment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ReviewsAttachments reviewsAttachment
 	 */
	public function update($reviewsAttachment);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByReviewId($value);

	public function queryByMedia($value);


	public function deleteByReviewId($value);

	public function deleteByMedia($value);


}
?>