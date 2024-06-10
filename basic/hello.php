<?php
require __DIR__ . "/vendor/autoload.php";

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class HelloCommand extends Command
{
    // Configure the command name and description
    protected static $defaultName = 'app:hello';

    protected function configure()
    {
        $this->setDescription('Outputs a greeting message')
        ->addArgument("name",InputArgument::OPTIONAL,"The name of the person to greet")
        ->addOption("greeting",null,InputOption::VALUE_OPTIONAL,"The greeting to use","Hello");
    }

    protected function execute(InputInterface $input, OutputInterface $output):int
    {
        $name=$input->getArgument("name");
        $greeting=$input->getOption("greeting");
        if($name){
            $message=sprintf("%s %s", $greeting, $name);
        }else{
            $message=sprintf("%s,World ",$greeting);
        }
        
        
        $output->writeln($message);
        return Command::SUCCESS;
    }
}

$application = new Application();
$application->add(new HelloCommand("app:hello"));
$application->run();