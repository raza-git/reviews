<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-03-01 15:03
 */
interface EntitiesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Entities 
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
 	 * @param entitie primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Entities entitie
 	 */
	public function insert($entitie);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Entities entitie
 	 */
	public function update($entitie);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByReviewId($value);

	public function queryByRating($value);


	public function deleteByName($value);

	public function deleteByReviewId($value);

	public function deleteByRating($value);


}
?>