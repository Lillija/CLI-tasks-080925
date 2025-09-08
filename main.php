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

$tasks = ["first task", "second task", "third task"];

class Task {
    public $id;
    public $content;

    public function __construct($id,$content){
        $this->id = $id;
        $this->content = $content;
    }

    public function display(){
        echo "The task ID is $this->id";
        echo "content: \n $this->content";
    }

    public function __destruct()
    {
        echo "Task with ID $this->id is being deleted.\n";
        echo "Task with content $this->content is being deleted.\n";
    }
}

function showAllTasks($inputTasks)
{
    echo "\n=== List of all tasks ===\n";
    foreach ($inputTasks as $task) {
        echo $task . "\n";
    }
    echo "=========================\n\n";
}
function addNewTask(&$inputTasks){
    $newTask = readline("Enter new task: ");
    $inputTasks[] = $newTask;
}
function deleteTask(&$tasks) {
    showAllTasks($tasks);

    $taskToDelete = readline("Which task do you want to delete? Enter task number (e.g., 1, 2, 3): ");

    if ($taskToDelete >= 1 && $taskToDelete <= count($tasks)) {
        unset($tasks[$taskToDelete - 1]);
        $tasks = array_values($tasks);
        echo "Task $taskToDelete has been deleted.\n";
    } else {
        echo "Invalid task number. Please try again.\n";
    }
}

while (true) {
    echo "Task Manager menu\n";
    echo "0 - EXIT\n";
    echo "1 - Display all tasks\n";
    echo "2 - Add new task\n";
    echo "3 - Delete a task\n";
    $input = readline();

    switch ($input) {
        case 0:
            exit;
        case 1:
            showAllTasks($tasks);
            break;
        case 2:
            addNewTask($tasks);
            break;
        case 3:
            deleteTask($tasks);
            break;
    }
}
?>