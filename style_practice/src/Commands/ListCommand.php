<?php
namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ListCommand extends Command
{
    protected function configure()
    {
        $this->setName("list");
        $this->setDescription("List Command description");

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $io = new SymfonyStyle($input, $output);
        $io->title("Tasks List");
        $io->section("Bullet List");

        $io->listing([

            "Task1:Learn Symfony",
            "Task2: Write a console command",
            "Task3: Use Symfony Style component",

        ]);

        $io->section("Numbered List");
        $items = [
            'First, you need to install Symfony.',
            'Second, create a new Symfony project.',
            'Third, write your command.',
        ];
        foreach ($items as $index => $item) {
            $io->text(($index + 1) . '. ' . $item);
        }

        $io->definitionList(
            'This is a title',
            ['foo1' => 'bar1'],
            ['foo2' => 'bar2'],
            ['foo3' => 'bar3'],
            new TableSeparator(),
            'This is another title',
            ['foo4' => 'bar4']
        );

// outputs a single blank line
        $io->newLine();

// outputs three consecutive blank lines
        $io->newLine(3);

        // use simple strings for short notes
        $io->note('Lorem ipsum dolor sit amet');

// ...

// consider using arrays when displaying long notes
        $io->note([
            'Lorem ipsum dolor sit amet',
            'Consectetur adipiscing elit',
            'Aenean sit amet arcu vitae sem faucibus porta',
        ]);

        // use simple strings for short caution message
        $io->caution('Lorem ipsum dolor sit amet');

// ...

// consider using arrays when displaying long caution messages
        $io->caution([
            'Lorem ipsum dolor sit amet',
            'Consectetur adipiscing elit',
            'Aenean sit amet arcu vitae sem faucibus porta',
        ]);

        return COMMAND::SUCCESS;
    }
}

/*
Additional Style Methods
The SymfonyStyle class provides various methods to enhance the console output:

title($message) - Display a title.
section($message) - Display a section.
text($message) - Display a text block.
success($message) - Display a success message.
warning($message) - Display a warning message.
error($message) - Display an error message.
ask($question, $default = null, $validator = null) - Ask for user input.
confirm($question, $default = true) - Ask for a yes/no confirmation.
choice($question, array $choices, $default = null) - Ask for a choice from a list of options.
progressStart($max = 0) - Start a progress bar.
progressAdvance($step = 1) - Advance the progress bar by a step.
progressFinish() - Finish the progress bar.
Using these methods, you can create rich, interactive, and user-friendly command-line interfaces.

Conclusion
By leveraging the Symfony Style component, you can significantly enhance the output of your console commands, making them more readable and interactive. This guide should help you get started with creating and styling your Symfony console commands effectively.

 */
