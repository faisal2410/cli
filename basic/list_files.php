<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require __DIR__ . "/vendor/autoload.php";

class ListFilesCommand extends Command
{
    protected static $defaultName = "app:list-files";

    protected function configure()
    {
        $this->setDescription("Lists Files in a directory")
            ->addArgument("directory", InputArgument::REQUIRED, "The directory to list files from.");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $directory = $input->getArgument("directory");
        if (!is_dir($directory)) {
            $output->writeln("<error>Invalid Directory</error>");
            return COMMAND::FAILURE;
        }

        $files = scandir($directory);
        foreach ($files as $file) {
            $output->writeln($file);
        }
        return COMMAND::SUCCESS;
    }
}

$application = new Application();
$application->add(new ListFilesCommand("app:list-files"));
$application->run();