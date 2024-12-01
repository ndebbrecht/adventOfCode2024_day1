<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:task2',
)]
class DayOneTaskTwoCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $content = file_get_contents(__DIR__ . '/input');
        $lines = explode("\n", $content);
        $list1 = [];
        $list2 = [];
        foreach ($lines as $line) {
            if ($line === "") {
                continue;
            }
            $values = explode("   ", $line);
            $list1[] = $values[0];
            $list2[] = $values[1];
        }
        $result = 0;
        foreach ($list1 as $element1) {
            $counter = 0;
            foreach ($list2 as $element2) {
                if ($element1 === $element2) {
                    $counter++;
                }
            }
            $result += $counter * $element1;
        }

        $io->success($result);

        return Command::SUCCESS;
    }
}
