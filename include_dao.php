<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/CategoriesDAO.class.php');
	require_once('class/dto/Categorie.class.php');
	require_once('class/mysql/CategoriesMySqlDAO.class.php');
	require_once('class/mysql/ext/CategoriesMySqlExtDAO.class.php');
	require_once('class/dao/EntitiesDAO.class.php');
	require_once('class/dto/Entitie.class.php');
	require_once('class/mysql/EntitiesMySqlDAO.class.php');
	require_once('class/mysql/ext/EntitiesMySqlExtDAO.class.php');
	require_once('class/dao/ReviewsDAO.class.php');
	require_once('class/dto/Review.class.php');
	require_once('class/mysql/ReviewsMySqlDAO.class.php');
	require_once('class/mysql/ext/ReviewsMySqlExtDAO.class.php');
	require_once('class/dao/ReviewsAttachmentsDAO.class.php');
	require_once('class/dto/ReviewsAttachment.class.php');
	require_once('class/mysql/ReviewsAttachmentsMySqlDAO.class.php');
	require_once('class/mysql/ext/ReviewsAttachmentsMySqlExtDAO.class.php');
	require_once('class/dao/UserInfoDAO.class.php');
	require_once('class/dto/UserInfo.class.php');
	require_once('class/mysql/UserInfoMySqlDAO.class.php');
	require_once('class/mysql/ext/UserInfoMySqlExtDAO.class.php');
	require_once('class/dao/UserReviewsDAO.class.php');
	require_once('class/dto/UserReview.class.php');
	require_once('class/mysql/UserReviewsMySqlDAO.class.php');
	require_once('class/mysql/ext/UserReviewsMySqlExtDAO.class.php');

        error_reporting(E_ERROR);
?>