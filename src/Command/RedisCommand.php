<?php

namespace Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class RedisCommand extends Command
{

    protected  $single_server = array(
        'host' => '127.0.0.1',
        'port' => 6379,
        'database' => 15,
    );

    protected function configure(): void
    {
        $this->setName('redis')
            ->setDescription('Redis add and delete values')
            ->setHelp(' add delete from Redis. ')
            ->addArgument('cmd', InputArgument::REQUIRED, 'add or delete')
            ->addArgument('key', InputArgument::REQUIRED, 'key')
            ->addArgument('value', InputArgument::OPTIONAL, 'value');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('работаем с Redis');
        $command = $input->getArgument('cmd');
        $key = $input->getArgument('key');
        $value = $input->getArgument('value');
        $client = new \Predis\Client($this->single_server);

        if ($command === 'add') {
            if($value === '') {
                $output->writeln(' add {key} {value}   : not value!!!');
                return Command::SUCCESS;
            }
            $client->set($key, $value);
            $output->writeln("Add key " . $key . " value " . $client->get($key));
        } elseif ($command === 'delete') {
            $value = $client->get($key);
            if($value){
            $client->del($key);
            $output->writeln('Delete key {' . $key. '} value {'. $value.'}');
            } else {
                $output->writeln('key {' . $key. '} not find');
            }
        }

        $output->writeln('Complete.');
        return Command::SUCCESS;
    }
}
