<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:task1',

)]
class DayOneTaskOneCommand extends Command
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
        sort($list1);
        sort($list2);
        $result = 0;
        for ($i = 0; $i < count($list1); ++$i) {
            $result += abs($list1[$i] - $list2[$i]);
        }

        $io->success($result);

        return Command::SUCCESS;
    }
}
