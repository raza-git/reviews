<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return CategoriesDAO
	 */
	public static function getCategoriesDAO(){
		return new CategoriesMySqlExtDAO();
	}

	/**
	 * @return EntitiesDAO
	 */
	public static function getEntitiesDAO(){
		return new EntitiesMySqlExtDAO();
	}

	/**
	 * @return ReviewsDAO
	 */
	public static function getReviewsDAO(){
		return new ReviewsMySqlExtDAO();
	}

	/**
	 * @return ReviewsAttachmentsDAO
	 */
	public static function getReviewsAttachmentsDAO(){
		return new ReviewsAttachmentsMySqlExtDAO();
	}

	/**
	 * @return UserInfoDAO
	 */
	public static function getUserInfoDAO(){
		return new UserInfoMySqlExtDAO();
	}

	/**
	 * @return UserReviewsDAO
	 */
	public static function getUserReviewsDAO(){
		return new UserReviewsMySqlExtDAO();
	}


}
?>