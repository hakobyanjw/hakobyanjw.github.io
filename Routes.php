<?php
Route::set('index.php', function(){
    Index::CreateView('Index');
});

Route::set('task', function(){
    Task::CreateView('Task');
});

Route::set('taskview', function(){
    TaskView::CreateView('TaskView');
});

Route::set('add', function(){
    Add::CreateView('Add');
});

Route::set('login', function(){
    LogIn::CreateView('LogIn');
});

Route::set('edit', function(){
    Edit::CreateView('Edit');
});

?>