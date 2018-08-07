<?php

namespace App\Command;

use Phpforce\SoapClient\ClientBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SyncCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:sync')
            ->setDescription('Sync Wordpress and Salesforce.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $builder = new ClientBuilder(
            getenv('SF_WSDL'),
            getenv('SF_USER'),
            getenv('SF_PASS'),
            getenv('SF_TOKEN')
        );
        $client = $builder->build();

        $products = $client->query('Select Name, RecordTypeId from Product2');
        echo $products->count() . ' products returned';

        foreach ($products as $product) {
            var_dump($product);
        }
    }
}
