<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-03-01 15:03
 */
interface ReviewsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Reviews 
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
 	 * @param review primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Reviews review
 	 */
	public function insert($review);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Reviews review
 	 */
	public function update($review);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCategoryId($value);

	public function queryByUserId($value);

	public function queryByDescription($value);

	public function queryByName($value);

	public function queryByLocation($value);

	public function queryByLatlong($value);

	public function queryByMedia($value);


	public function deleteByCategoryId($value);

	public function deleteByUserId($value);

	public function deleteByDescription($value);

	public function deleteByName($value);

	public function deleteByLocation($value);

	public function deleteByLatlong($value);

	public function deleteByMedia($value);


}
?>