<?php
namespace MZKCommon\Controller;

use VuFind\Controller\AbstractBase;
use Zend\View\Model\ViewModel;

/**
 * StatisticsController
 * 
 * @author	Martin Kravec	<kravec@mzk.cz>
 */
class StatisticsController extends AbstractBase
{
	public function dashboardAction()
	{
		$PiwikStatistics = $this->getServiceLocator()
								->get('MZKCommon\StatisticsPiwikStatistics');

		$view = $this->createViewModel(	
			array(
				'newVisitorsCount' 			=> $PiwikStatistics->getNewVisitorsCount('range', '2015-01-01,2015-12-31'),
				'returningVisitorsCount' 	=> $PiwikStatistics->getReturningVisitorsCount('range', '2015-01-01,2015-12-31'),
			)
		);
		
		$view->setTemplate('statistics/dashboard');
		
		return $view;
	}
	
	public function searchesAction()
	{
		$view = $this->createViewModel(
			array(
				'statistics'  => 'searches',
			)
		);
		
		$view->setTemplate('statistics/searches');
		
		return $view;
	}
	
	public function circulationsAction()
	{
		$view = $this->createViewModel(
			array(
				'statistics'  => 'circulations',
			)
		);
		
		$view->setTemplate('statistics/circulations');
		
		return $view;
	}
	
	public function paymentsAction()
	{
		$view = $this->createViewModel(
			array(
				'statistics'  => 'payments',
			)
		);
		
		$view->setTemplate('statistics/payments');
		
		return $view;
	}
	
	public function visitsAction()
	{
		$view = $this->createViewModel(
			array(
				'statistics'  => 'visits',
			)
		);
		
		$view->setTemplate('statistics/visits');
		
		return $view;
	}
}