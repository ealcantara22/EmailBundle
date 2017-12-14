<?php

namespace NTI\EmailBundle\Command;

use NTI\EmailBundle\Entity\Email;
use NTI\EmailBundle\Entity\Smtp;
use Swift_Spool;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('nti:email:check')
            ->setDescription('Check the spool folder for changes in the email statuses')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('nti.mailer')->check($output);
    }

}
