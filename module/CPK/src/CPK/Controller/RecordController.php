<?php
/**
 * MyResearch Controller
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
 * @category VuFind2
 * @package  Controller
 * @author   Martin Kravec <Martin.Kravec@mzk.cz>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org   Main Site
 */
namespace CPK\Controller;

use MZKCommon\Controller\RecordController as RecordControllerBase;

/**
 * Redirects the user to the appropriate default VuFind action.
 *
 * @category VuFind2
 * @package  Controller
 * @author   Martin Kravec <Martin.Kravec@mzk.cz>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org   Main Site
 */
class RecordController extends RecordControllerBase
{
/**
     * Display a particular tab.
     *
     * @param string $tab  Name of tab to display
     * @param bool   $ajax Are we in AJAX mode?
     *
     * @return mixed
     */
    protected function showTab($tab, $ajax = false)
    {
        // Special case -- handle login request (currently needed for holdings
        // tab when driver-based holds mode is enabled, but may also be useful
        // in other circumstances):
        if ($this->params()->fromQuery('login', 'false') == 'true'
            && !$this->getUser()
        ) {
            return $this->forceLogin(null);
        } else if ($this->params()->fromQuery('catalogLogin', 'false') == 'true'
            && !is_array($patron = $this->catalogLogin())
        ) {
            return $patron;
        }

        $view = $this->createViewModel();
        $view->tabs = $this->getAllTabs();
        $view->activeTab = strtolower($tab);
        $view->defaultTab = strtolower($this->getDefaultTab());

        // Set up next/previous record links (if appropriate)
        if ($this->resultScrollerActive()) {
            $driver = $this->loadRecord();
            $view->scrollData = $this->resultScroller()->getScrollData($driver);
        }
        
        // get 886links
        $linksFrom856 = $this->get886Links();
        if ($linksFrom856 !== false)
        	$view->linksFrom856 = $linksFrom856;
        
        $view->config = $this->getConfig();

        $view->setTemplate($ajax ? 'record/ajaxtab' : 'record/view');
        return $view;
    }
	
    protected function get886Links()
    {
    	$parentRecordID = $this->driver->getParentRecordID();
    	$recordLoader = $this->getServiceLocator()->get('VuFind\RecordLoader');
    	$recordDriver = $recordLoader->load($parentRecordID);
    	$links = $recordDriver->get856Links();
    	return $links;
    }
}