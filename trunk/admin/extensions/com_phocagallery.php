<?php
/**
 * jUpgrade
 *
 * @version		$Id:
 * @package		MatWare
 * @subpackage	com_jupgrade
 * @copyright	Copyright 2006 - 2011 Matias Aguirre. All rights reserved.
 * @license		GNU General Public License version 2 or later.
 * @author		Matias Aguirre <maguirre@matware.com.ar>
 * @link		http://www.matware.com.ar
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * jUpgrade class for PhocaGallery migration
 *
 * This class migrates the PhocaGallery extension
 *
 * @since		1.2.4
 */
class jUpgradeComponentPhocaGallery extends jUpgradeExtensions
{
	/**
	 * Check if extension migration is supported.
	 *
	 * @return	boolean
	 * @since	1.2.4
	 */
	protected function detectExtension()
	{
		return true;
	}

	/**
	 * Migrate tables
	 *
	 * @return	boolean
	 * @since	1.2.4
	 */
	public function migrateExtensionCustom()
	{
		$error = '';

		// table: #__phocagallery
		$query = "ALTER TABLE `#__phocagallery` ADD metadata text AFTER metadesc";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();

		$query = "ALTER TABLE `#__phocagallery` ADD exttype tinyint(1) NOT NULL DEFAULT '0' AFTER extid";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();

		$query = "ALTER TABLE `#__phocagallery` ADD `language` char(7) NOT NULL DEFAULT '' AFTER exth";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();


		// table: #__phocagallery_categories
		$query = "ALTER TABLE `#__phocagallery_categories` ADD extfbuid varchar(255) NOT NULL DEFAULT '' AFTER extauth";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();

		$query = "ALTER TABLE `#__phocagallery_categories` ADD extfbcatid varchar(255) NOT NULL DEFAULT '' AFTER extfbuid";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();

		$query = "ALTER TABLE `#__phocagallery_categories` ADD metadata text AFTER metadesc";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();

		$query = "ALTER TABLE `#__phocagallery_categories` ADD `language` char(7) NOT NULL DEFAULT '' AFTER metadata";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();


		// table: #__phocagallery_comments
		$query = "ALTER TABLE `#__phocagallery_comments` ADD alias varchar(255) NOT NULL DEFAULT '' AFTER title";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();

		$query = "ALTER TABLE `#__phocagallery_comments` ADD `language` char(7) NOT NULL DEFAULT '' AFTER params";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();


		// table: #__phocagallery_img_comments
		$query = "ALTER TABLE `#__phocagallery_img_comments` ADD alias varchar(255) NOT NULL DEFAULT '' AFTER title";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();

		$query = "ALTER TABLE `#__phocagallery_img_comments` ADD `language` char(7) NOT NULL DEFAULT '' AFTER params";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();


		// table: #__phocagallery_img_votes
		$query = "ALTER TABLE `#__phocagallery_img_votes` ADD `language` char(7) NOT NULL DEFAULT '' AFTER params";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();


		// table: #__phocagallery_img_votes_statistics
		$query = "ALTER TABLE `#__phocagallery_img_votes_statistics` ADD `language` char(7) NOT NULL DEFAULT '' AFTER average";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();

		$query = "ALTER TABLE `#__phocagallery_img_votes_statistics` CHANGE `count` `count` int(11) NOT NULL DEFAULT '0'";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();


		// table: #__phocagallery_user
		$query = "ALTER TABLE `#__phocagallery_user` ADD `language` char(7) NOT NULL DEFAULT '' AFTER params";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();


		// table: #__phocagallery_votes
		$query = "ALTER TABLE `#__phocagallery_votes` ADD `language` char(7) NOT NULL DEFAULT '' AFTER params";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();


		// table: #__phocagallery_votes_statistics
		$query = "ALTER TABLE `#__phocagallery_votes_statistics` ADD `language` char(7) NOT NULL DEFAULT '*' AFTER average";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();

		$query = "ALTER TABLE `#__phocagallery_votes_statistics` CHANGE `count` `count` int(11) NOT NULL DEFAULT '0'";
		$this->db_new->setQuery($query);
		$this->db_new->query();
		$error .= $this->db_new->getErrorMsg();

		$query  = "UPDATE `#__phocagallery` SET `language` = '*' ; ";
		$query .= "UPDATE `#__phocagallery_categories` SET `language` = '*' ; ";
		$query .= "UPDATE `#__phocagallery_comments` SET `language` = '*' ; ";
		$query .= "UPDATE `#__phocagallery_img_comments` SET `language` = '*' ; ";
		$query .= "UPDATE `#__phocagallery_img_votes` SET `language` = '*' ; ";
		$query .= "UPDATE `#__phocagallery_img_votes_statistics` SET `language` = '*' ; ";
		$query .= "UPDATE `#__phocagallery_votes` SET `language` = '*' ; ";
		$query .= "UPDATE `#__phocagallery_votes_statistics` SET `language` = '*' ";
		//$query .= "UPDATE `#__phocagallery_fb_users` SET `language` = '*' ; ";
		//$query .= "UPDATE `#__phocagallery_tags` SET `language` = '*' ; ";
		$this->db_new->setQuery($query);
		$this->db_new->queryBatch();
		$error .= $this->db_new->getErrorMsg();


		if ($error) {
			throw new Exception($error);
		}

		return true;
	}
}
