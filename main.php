<?php
// Aplikācija "Tasks" jeb uzdevumi
// Ok - 1) izveidojam jaunu PHP projektu "Tasks" un versionējam
// Ok - 2) izveidojam while ciklu, kas vaicā pēc lietotāja ievades (ar 'readline') katrā iterācijā (iziet ar Ctrl+C)
// Ok - 3) while cikls tiek pārtraukts, ja lietotājs ievada "n"
// Ok - 4) izveidojam uzdevumu (tasks) sarakstu kā String elementus izmantojot indeksēta masīva datu struktūru (3 testa elementus)
// Ok - 5) izveidojiet "switch..case" konstrukciju, kas ļauj apstrādāt lietotāja ievadīto izvēli
// Ok - 6) pievienojiet 'case' jeb gadījumu '1', kuru ievadot lietotājam tiek izvadīts viss uzdevumu saraksts
// Ok - 7) uzlabojiet šo 'case: 1' bloku, lai tas izsauktu funkciju, kas atgriež uzdevumus
// Ok - 8) izvadiet lietotāja izvēlnes tekstu, kas to infomē par veicamajām darbībām CLI aplikācijā
// Ok - 9) izveidojiet izvēlni, kas ļauj lietotājam pievienot jaunu uzdevumu
// Ok - 10) izveidojiet izvēlni, kas ļauj lietotājam dzēst eksistējošu uzdevumu

// $tasks = ["first task", "second task", "third task"];

class Task
{
    public $id;
    public $content;

    public function __construct($id, $content)
    {
        $this->id = $id;
        $this->content = $content;
    }

    public function edit() {}

    public function display()
    {
        echo "\nThe task ID is $this->id\n";
        echo "content: \n $this->content";
    }
}

$tasks = [
    new Task(0, "first task"),
    new Task(1, "second task"),
    new Task(2, "third task"),
];

function showAllTasks($inpTasks)
{
    foreach ($inpTasks as $task) {
        $task->display();
    }
}
function addTask(&$inpTasks)
{
    $newContent = readline("Enter new task \n");
    $newId = count($inpTasks);
    $inpTasks[] = new Task($newId, $newContent);
}
function editTask(&$inpTasks)
{
    echo "Which task would you like to edit?\n";
    $taskNum = readline("Enter the task number (0-" . (count($inpTasks) - 1) . ") \n");
    if (isset($inpTasks[$taskNum])) {
        echo "Current task content: \n";
        $inpTasks[$taskNum]->display();
        $newContent = readline("\nEnter new content for this task: \n");
        $inpTasks[$taskNum]->content = $newContent;
        echo "Task ID {$inpTasks[$taskNum]->id} has been updated.\n";
    } else {
        echo "Invalid task number. Please try again.\n";
    }
}
function deleteTask(&$inpTasks)
{
    echo "(example: 0. first task, 1. second task)\n";
    $taskNum = readline("Enter the task number (0-10) \n");
    unset($inpTasks[$taskNum]);
    $inpTasks = array_values($inpTasks);
}


while (true) {
    $inp = readline("Choose 1 - to show tasks, \n 2 - to add a new task, \n 3 - to delete a task, \n 4 - to edit an existing task, \n 0 - to exit. \n");
    switch ($inp) {
        case 0:
            echo "You have exited";
            exit;
        case 1:
            echo "\n === here are your tasks: === \n";
            echo "\n ----------- \n";
            showAllTasks($tasks);
            echo "\n ----------- \n";
            echo "\n=== To continue: ===\n";
            break;
        case 2:
            echo "\n === Enter new task ===\n";
            addTask($tasks);
            echo "\n === Task added ===\n";
            break;
        case 3:
            echo "\n === Which task do you want to delete? === \n";
            deleteTask($tasks);
            echo "\n === Task deleted ===\n";
            break;
        case 4:
            echo "\n === Which task do you want to edit? === \n";
            editTask($tasks);
            break;
    }
}
