<?php
/**
 * Class that operate on table 'categories'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-03-01 15:03
 */
class CategoriesMySqlDAO implements CategoriesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CategoriesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM categories WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM categories';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
        
	public function queryHierarchy(){
		$sql = 'SELECT t1.name AS lev1, t2.name as lev2, t3.name as lev3
                        FROM categories AS t1
                        LEFT JOIN categories AS t2 ON t2.parent = t1.id
                        LEFT JOIN categories AS t3 ON t3.parent = t2.id
                        ';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList2($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM categories ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param categorie primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM categories WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CategoriesMySql categorie
 	 */
	public function insert($categorie){
		$sql = 'INSERT INTO categories (name, parent) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categorie->name);
		$sqlQuery->setNumber($categorie->parent);

		$id = $this->executeInsert($sqlQuery);	
		$categorie->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CategoriesMySql categorie
 	 */
	public function update($categorie){
		$sql = 'UPDATE categories SET name = ?, parent = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categorie->name);
		$sqlQuery->setNumber($categorie->parent);

		$sqlQuery->setNumber($categorie->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM categories';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM categories WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByParent($value){
		$sql = 'SELECT * FROM categories WHERE parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM categories WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByParent($value){
		$sql = 'DELETE FROM categories WHERE parent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CategoriesMySql 
	 */
	protected function readRow($row){
		$categorie = new Categorie();
		
		$categorie->id = $row['id'];
		$categorie->name = $row['name'];
		$categorie->parent = $row['parent'];

		return $categorie;
	}
        
	protected function readRow2($row){
		$categorie = new Categorie();
		
		$categorie->lev1 = $row['lev1'];
		$categorie->lev2 = $row['lev2'];
		$categorie->lev3 = $row['lev3'];

		return $categorie;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	protected function getList2($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow2($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return CategoriesMySql 
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