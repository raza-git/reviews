<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-03-01 15:03
 */
interface CategoriesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Categories 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
        
	public function queryHierarchy();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param categorie primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Categories categorie
 	 */
	public function insert($categorie);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Categories categorie
 	 */
	public function update($categorie);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByParent($value);


	public function deleteByName($value);

	public function deleteByParent($value);


}
?>