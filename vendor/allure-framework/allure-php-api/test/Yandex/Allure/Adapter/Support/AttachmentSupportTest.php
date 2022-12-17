<?php

namespace Yandex\Allure\Adapter\Support;

use Yandex\Allure\Adapter\Allure;
use Yandex\Allure\Adapter\Event\AddAttachmentEvent;
use Yandex\Allure\Adapter\Model\Provider;

class AttachmentSupportTest extends \PHPUnit_Framework_TestCase
{
    use AttachmentSupport;

    public function testAddAttachment()
    {
        $attachmentContents = 'test-contents';
        $attachmentCaption = 'test-title';
        $attachmentType = 'text/html';
        Provider::setOutputDirectory(sys_get_temp_dir());
        $this->addAttachment($attachmentContents, $attachmentCaption, $attachmentType);
        $event = Allure::lifecycle()->getLastEvent();
        $this->assertTrue(
            ($event instanceof AddAttachmentEvent) &&
            ($event->getFilePathOrContents() === $attachmentContents) &&
            ($event->getCaption() === $attachmentCaption) &&
            ($event->getType() === $attachmentType)
        );
    }
}
