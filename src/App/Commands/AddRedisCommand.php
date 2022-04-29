<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ClearcacheCommand extends Command
{
    protected function configure(): void
    {
        $this->setName('redis')
            ->setDescription('Redis add and delete values')
            ->setHelp(' add delete from Redis. ')
            ->addOption(
                'add',
                'delete',
                InputOption::VALUE_OPTIONAL,
                'separated key value for add',
                ''
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('работаем с Redis');

        if ($input->getOption('add')) {
            $option = explode(" ", $input->getOption('add'));
          //  $client = new Predis\Client();

            $output->writeln("Add key ". $option[0]. " value ". $option[1]);
        } elseif($input->getOption('delete')) {
            $output->writeln('Delete key'. $input->getOption('delete'));
        }

        $output->writeln('Complete.');
        return 0;
    }
}
