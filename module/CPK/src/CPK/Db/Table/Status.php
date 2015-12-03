<?php
/**
 * Table Definition for status
 *
 * PHP version 5
 *
 * Copyright (C) Villanova University 2010.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 */
namespace CPK\Db\Table;

use VuFind\Db\Table\Gateway;
use Zend\Db\Sql\Expression;
//use VuFind\Db\Table\User as BaseUser, CPK\Db\Row\User as UserRow, Zend\Db\Sql\Select, Zend\Db\Sql\Update, Zend\Db\Adapter\Driver\Mysqli\Result;

/**
 * Table Definition for status
 *
 * @category VuFind2
 * @package  CPK/Db_Table
 * @author   Jakub Sestak <sestak@mzk.cz>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org   Main Site
 */
class Status extends Gateway
{

    /**
     * Constructor
     *
     * @param \Zend\Config\Config $config
     *            VuFind configuration
     */
    public function __construct(\Zend\Config\Config $config)
    {
        $this->table = 'status';
        $this->rowClass = 'CPK\Db\Row\Status';
        $this->config = $config;
    }


}