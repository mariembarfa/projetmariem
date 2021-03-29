<?php

namespace App\Controller;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ComboChart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatController extends AbstractController
{
    /**
     * @Route("/stat", name="stat")
     */
    public function indexAction()
    {

        $combo = new ComboChart();
        $combo->getData()->setArrayToDataTable([
            ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
            ['2004/05',  165,      938,         522,             998,           450,      614.6],
            ['2005/06',  135,      1120,        599,             1268,          288,      682],
            ['2006/07',  157,      1167,        587,             807,           397,      623],
            ['2007/08',  139,      1110,        615,             968,           215,      609.4],
            ['2008/09',  136,      691,         629,             1026,          366,      569.6]
        ]);
        $combo->getOptions()->setTitle('Monthly Coffee Production by Country');
        $combo->getOptions()->getVAxis()->setTitle('Cups');
        $combo->getOptions()->getHAxis()->setTitle('Month');
        $combo->getOptions()->setSeriesType('bars');

        $series5 = new \CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series();
        $series5->setType('line');
        $combo->getOptions()->setSeries([5 => $series5]);

        $combo->getOptions()->setWidth(900);
        $combo->getOptions()->setHeight(500);
        return $this->render('stat/index.html.twig', array('piechart' => $combo));
    }
}
