<?php

namespace Assignment\Weather\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Pdf extends Action
{
    /**
     * @var \Magento\Framework\App\Response\Http\FileFactory
     */
    protected $fileFactory;

    /**
     * @param Context $context
     */
    public function __construct(
        Context                                          $context,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory
    )
    {
        $this->fileFactory = $fileFactory;
        parent::__construct($context);
    }

    /**
     * to generate pdf
     *
     * @return \Magento\Framework\App\ResponseInterface
     */
    public function execute()
    {

        $resource = $this->_objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();

        $tableName = $resource->getTableName('assignment_weather');
        $select = $connection->select()->from($tableName);
        $result = $connection->fetchAll($select);


        $pdf = new \Zend_Pdf();
        $pdf->pages[] = $pdf->newPage(850, 960);
        $page = $pdf->pages[0];

        $style = new \Zend_Pdf_Style();
        $style->setLineColor(new \Zend_Pdf_Color_Rgb(0, 0, 0));
        $font = \Zend_Pdf_Font::fontWithName(\Zend_Pdf_Font::FONT_TIMES_BOLD);
        $style->setFont($font, 22);
        $page->setStyle($style);
        $x = 30;
        $this->y = 850;
        $page->drawText(__("Weather Historical Data"), $x + 270, $this->y + 30, 'UTF-8');

        $style = new \Zend_Pdf_Style();
        $style->setLineColor(new \Zend_Pdf_Color_Rgb(0, 0, 0));
        $font = \Zend_Pdf_Font::fontWithName(\Zend_Pdf_Font::FONT_TIMES_BOLD);
        $style->setFont($font, 12);
        $page->setStyle($style);
        $width = $page->getWidth();
        $hight = $page->getHeight();
        $x = 30;
        $pageTopalign = 850;
        $this->y = 850 - 100;
        $page->drawText(__("City"), $x + 0, $this->y + 30, 'UTF-8');
        $page->drawText(__("Country"), $x + 40, $this->y + 30, 'UTF-8');
        $page->drawText(__("Description"), $x + 90, $this->y + 30, 'UTF-8');
        $page->drawText(__("Temp"), $x + 170, $this->y + 30, 'UTF-8');
        $page->drawText(__("Feels Like"), $x + 220, $this->y + 30, 'UTF-8');
        $page->drawText(__("Pressure"), $x + 290, $this->y + 30, 'UTF-8');
        $page->drawText(__("Humidity"), $x + 350, $this->y + 30, 'UTF-8');
        $page->drawText(__("Wind Speed"), $x + 420, $this->y + 30, 'UTF-8');
        $page->drawText(__("Sunrise"), $x + 520, $this->y + 30, 'UTF-8');
        $page->drawText(__("Sunset"), $x + 630, $this->y + 30, 'UTF-8');
        $page->drawText(__("Checked On"), $x + 720, $this->y + 30, 'UTF-8');

        $style->setFont($font, 10);
        $page->setStyle($style);
        $add = 9;
        $pageCount = 0;
        $style = new \Zend_Pdf_Style();
        $style->setLineColor(new \Zend_Pdf_Color_Rgb(0, 0, 0));
        $font = \Zend_Pdf_Font::fontWithName(\Zend_Pdf_Font::FONT_TIMES);
        $style->setFont($font, 10);
        $page->setStyle($style);
        foreach ($result as $row) {
            if ($this->y === 60) {

                $pageCount++;
                $pdf->pages[] = $pdf->newPage(750, 860);
                $this->y = 850;
                $page = $pdf->pages[$pageCount];
                $style = new \Zend_Pdf_Style();
                $style->setLineColor(new \Zend_Pdf_Color_Rgb(0, 0, 0));
                $font = \Zend_Pdf_Font::fontWithName(\Zend_Pdf_Font::FONT_TIMES);
                $style->setFont($font, 10);
                $page->setStyle($style);
            }
            $sunset_time = date('Y-m-d H:i:s A', strtotime($row['sunset']));
            $sunrise_time = date('Y-m-d H:i:s A', strtotime($row['sunrise']));
            $page->drawText($row['city'], $x + 0, $this->y - 30, 'UTF-8');
            $page->drawText($row['country'], $x + 60, $this->y - 30, 'UTF-8');
            $page->drawText($row['description'], $x + 100, $this->y - 30, 'UTF-8');
            $page->drawText($row['temperature'], $x + 175, $this->y - 30, 'UTF-8');
            $page->drawText($row['feels_like'], $x + 240, $this->y - 30, 'UTF-8');
            $page->drawText($row['pressure'], $x + 305, $this->y - 30, 'UTF-8');
            $page->drawText($row['humidity'], $x + 370, $this->y - 30, 'UTF-8');
            $page->drawText($row['wind_speed'], $x + 440, $this->y - 30, 'UTF-8');
            $page->drawText($sunrise_time, $x + 490, $this->y - 30, 'UTF-8');
            $page->drawText($sunset_time, $x + 610, $this->y - 30, 'UTF-8');
            $page->drawText($row['checked_on'], $x + 720, $this->y - 30, 'UTF-8');
            $this->y -= 30;
        }


        $this->getResponse()
            ->setHttpResponseCode(200)
            ->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true)
            ->setHeader('Pragma', 'public', true)
            ->setHeader('Content-type', 'application/pdf', true);
        $this->getResponse()->setBody($pdf->render());
    }
}
