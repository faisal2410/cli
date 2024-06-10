<?php
namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GreetCommand extends Command
{
    protected function configure()
    {
        $this->setName("greet");
        $this->setDescription("Greeting to all");
        
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        
        $io=new SymfonyStyle($input, $output);
        $io->title("Welcome to symfony console");
        $io->section("Greeting section");
        $io->text(["This is a simple greeting command", "It demonstrate use of symfony style component"]);

        $io->success("Your command has been executed successfully");

        $io->warning("This is a warning message");
        $io->error("This is an error message");

        $name=$io->ask("What is your name?");
        $io->success("Hello, {$name}");

        $confirm=$io->confirm("Are you sure?");
        if($confirm){
            $io->success("You are admitted");
        }else{
            $io->error("Try again!");
        }

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